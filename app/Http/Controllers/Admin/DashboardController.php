<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Mostrar dashboard principal
     */
    public function index()
    {
        // Estadísticas generales
        $stats = [
            'total_posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'draft_posts' => BlogPost::where('status', 'draft')->count(),
            'total_contacts' => Contact::count(),
            'new_contacts' => Contact::new()->count(),
            'total_categories' => Category::active()->count(),
            'total_views' => BlogPost::sum('views'),
        ];

        // Posts recientes
        $recentPosts = BlogPost::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'status' => $post->status,
                    'author' => $post->user->name,
                    'category' => $post->category?->name,
                    'created_at' => $post->created_at->format('d/m/Y H:i'),
                    'views' => $post->views,
                ];
            });

        // Contactos recientes
        $recentContacts = Contact::latest()
            ->take(5)
            ->get()
            ->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'subject' => $contact->subject,
                    'status' => $contact->status,
                    'status_text' => $contact->status_text,
                    'status_class' => $contact->status_class,
                    'created_at' => $contact->created_at->format('d/m/Y H:i'),
                ];
            });

        // Estadísticas de los últimos 30 días
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $monthlyStats = [
            'posts_created' => BlogPost::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'contacts_received' => Contact::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'total_views' => BlogPost::where('created_at', '>=', $thirtyDaysAgo)->sum('views'),
        ];

        // Posts más populares
        $popularPosts = BlogPost::published()
            ->orderBy('views', 'desc')
            ->take(5)
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'views' => $post->views,
                    'url' => $post->url,
                ];
            });

        // Categorías con más posts
        $topCategories = Category::withCount('blogPosts')
            ->having('blog_posts_count', '>', 0)
            ->orderBy('blog_posts_count', 'desc')
            ->take(5)
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'posts_count' => $category->blog_posts_count,
                    'color' => $category->color,
                ];
            });

        return Inertia::render('Admin/Dashboard', [
            'stats' => $stats,
            'monthlyStats' => $monthlyStats,
            'recentPosts' => $recentPosts,
            'recentContacts' => $recentContacts,
            'popularPosts' => $popularPosts,
            'topCategories' => $topCategories,
        ]);
    }
}
