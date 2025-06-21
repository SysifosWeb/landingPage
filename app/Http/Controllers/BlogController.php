<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogPost::with(['category', 'user'])
            ->where('status', 'published')
            ->orderBy('published_at', 'desc');

        // Filtrar por categoría si se especifica
        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filtrar por búsqueda si se especifica
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('excerpt', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $posts = $query->paginate(9);

        // Obtener categorías con conteo de posts
        $categories = Category::withCount(['posts' => function ($query) {
            $query->where('status', 'published');
        }])->get();

        // Obtener posts destacados
        $featuredPosts = BlogPost::with(['category', 'user'])
            ->where('status', 'published')
            ->where('featured', true)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return Inertia::render('Blog', [
            'posts' => $posts,
            'categories' => $categories,
            'featuredPosts' => $featuredPosts,
            'secondaryNavbarData' => [
                'title' => 'Blog',
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
