<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::withCount('blogPosts');

        // Filtros
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%");
        }

        if ($request->filled('active')) {
            $query->where('active', $request->boolean('active'));
        }

        // Ordenamiento
        $sortBy = $request->get('sort_by', 'sort_order');
        $sortOrder = $request->get('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        $categories = $query->paginate(15)->appends($request->query());

        return Inertia::render('Admin/Categories/Index', [
            'categories' => $categories,
            'filters' => $request->only(['search', 'active']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'slug.unique' => 'Este slug ya está en uso.',
            'slug.max' => 'El slug no puede tener más de 255 caracteres.',
            'description.max' => 'La descripción no puede tener más de 1000 caracteres.',
            'color.regex' => 'El color debe ser un código hexadecimal válido (ej: #3B82F6).',
            'sort_order.integer' => 'El orden debe ser un número entero.',
            'sort_order.min' => 'El orden debe ser mayor o igual a 0.',
        ]);

        // Generar slug si no se proporciona
        if (empty($validated['slug'])) {
            $validated['slug'] = $this->generateUniqueSlug($validated['name']);
        }

        // Si no se proporciona sort_order, usar el siguiente disponible
        if (!isset($validated['sort_order']) || $validated['sort_order'] === null) {
            $validated['sort_order'] = (Category::max('sort_order') ?? 0) + 1;
        }

        // Asegurar que active sea boolean
        $validated['active'] = $validated['active'] ?? true;

        try {
            Category::create($validated);

            return redirect()->route('admin.categories.index')
                ->with('success', 'Categoría creada exitosamente.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al crear la categoría: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load(['blogPosts' => function ($query) {
            $query->with('user')->latest()->take(10);
        }]);

        return Inertia::render('Admin/Categories/Show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Admin/Categories/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('categories')->ignore($category->id)],
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'slug.unique' => 'Este slug ya está en uso.',
            'slug.max' => 'El slug no puede tener más de 255 caracteres.',
            'description.max' => 'La descripción no puede tener más de 1000 caracteres.',
            'color.regex' => 'El color debe ser un código hexadecimal válido (ej: #3B82F6).',
            'sort_order.integer' => 'El orden debe ser un número entero.',
            'sort_order.min' => 'El orden debe ser mayor o igual a 0.',
        ]);

        // Generar slug si está vacío
        if (empty($validated['slug'])) {
            $validated['slug'] = $this->generateUniqueSlug($validated['name'], $category->id);
        }

        // Asegurar que active sea boolean
        $validated['active'] = $validated['active'] ?? false;

        try {
            $category->update($validated);

            return redirect()->route('admin.categories.index')
                ->with('success', 'Categoría actualizada exitosamente.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al actualizar la categoría: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Verificar si tiene posts asociados
        if ($category->blogPosts()->exists()) {
            return back()->withErrors([
                'error' => 'No se puede eliminar la categoría porque tiene posts asociados.'
            ]);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría eliminada exitosamente.');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Category $category)
    {
        $category->update(['active' => !$category->active]);

        $status = $category->active ? 'activada' : 'desactivada';
        return back()->with('success', "Categoría {$status} exitosamente.");
    }

    /**
     * Generar slug único
     */
    private function generateUniqueSlug($name, $excludeId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        $query = Category::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        while ($query->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
            $query = Category::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
        }

        return $slug;
    }
}
