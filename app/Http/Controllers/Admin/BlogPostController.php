<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogPost::with(['user', 'category']);

        // Filtros
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('featured')) {
            $query->where('featured', $request->boolean('featured'));
        }

        // Ordenamiento
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        // Validar campos de ordenamiento
        $allowedSortFields = ['created_at', 'updated_at', 'title', 'views', 'published_at'];
        if (!in_array($sortBy, $allowedSortFields)) {
            $sortBy = 'created_at';
        }

        $query->orderBy($sortBy, $sortOrder);

        $posts = $query->paginate(15)->appends($request->query());

        $categories = Category::active()->ordered()->get();

        return Inertia::render('Admin/Posts/Index', [
            'posts' => $posts,
            'categories' => $categories,
            'filters' => $request->only(['search', 'status', 'category', 'featured']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->ordered()->get();

        return Inertia::render('Admin/Posts/Create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'nullable|date',
        ]);

        // Generar slug si no se proporciona
        if (empty($validated['slug'])) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title']);
        }

        // Procesar meta keywords
        if (!empty($validated['meta_keywords'])) {
            $validated['meta_keywords'] = array_map('trim', explode(',', $validated['meta_keywords']));
        }

        // Manejar imagen destacada
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog-images', 'public');
        }

        // Asignar usuario actual
        $validated['user_id'] = Auth::id();

        // Si se publica, establecer fecha de publicación
        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $post = BlogPost::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $post)
    {
        $post->load(['user', 'category']);

        return Inertia::render('Admin/Posts/Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $post)
    {
        $categories = Category::active()->ordered()->get();

        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('blog_posts')->ignore($post->id)],
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'nullable|date',
        ]);

        // Generar slug si no se proporciona
        if (empty($validated['slug'])) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title'], $post->id);
        }

        // Procesar meta keywords
        if (!empty($validated['meta_keywords'])) {
            $validated['meta_keywords'] = array_map('trim', explode(',', $validated['meta_keywords']));
        }

        // Manejar imagen destacada
        if ($request->hasFile('featured_image')) {
            // Eliminar imagen anterior si existe
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blog-images', 'public');
        }

        // Si se publica por primera vez, establecer fecha de publicación
        if ($validated['status'] === 'published' && $post->status !== 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $post)
    {
        // Eliminar imagen destacada si existe
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post eliminado exitosamente.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(BlogPost $post)
    {
        $post->update(['featured' => !$post->featured]);

        return back()->with('success', 'Estado destacado actualizado.');
    }

    /**
     * Publish post
     */
    public function publish(BlogPost $post)
    {
        $post->update([
            'status' => 'published',
            'published_at' => $post->published_at ?: now(),
        ]);

        return back()->with('success', 'Post publicado exitosamente.');
    }

    /**
     * Unpublish post
     */
    public function unpublish(BlogPost $post)
    {
        $post->update(['status' => 'draft']);

        return back()->with('success', 'Post despublicado exitosamente.');
    }

    /**
     * Generar slug único
     */
    private function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        $query = BlogPost::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        while ($query->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
            $query = BlogPost::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
        }

        return $slug;
    }
}
