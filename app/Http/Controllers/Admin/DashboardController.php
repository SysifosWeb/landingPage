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
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Mostrar dashboard principal con datos completos
     */
    public function index()
    {
        // Estadísticas generales
        $stats = [
            'total_posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'draft_posts' => BlogPost::where('status', 'draft')->count(),
            'featured_posts' => BlogPost::where('featured', true)->count(),
            'total_contacts' => Contact::count(),
            'new_contacts' => Contact::where('status', 'new')->count(),
            'read_contacts' => Contact::where('status', 'read')->count(),
            'replied_contacts' => Contact::where('status', 'replied')->count(),
            'total_categories' => Category::count(),
            'active_categories' => Category::where('active', true)->count(),
            'total_users' => User::count(),
            'admin_users' => User::where('role', 'admin')->count(),
            'editor_users' => User::where('role', 'editor')->count(),
            'total_views' => BlogPost::sum('views'),
            'avg_views_per_post' => round(BlogPost::avg('views') ?? 0),
        ];

        // Posts recientes con más información
        $recentPosts = BlogPost::with(['user', 'category'])
            ->latest()
            ->take(8)
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'status' => $post->status,
                    'is_published' => $post->status === 'published',
                    'featured' => $post->featured,
                    'author' => $post->user->name,
                    'author_role' => $post->user->role,
                    'category' => $post->category?->name,
                    'category_color' => $post->category?->color,
                    'views' => $post->views,
                    'created_at' => $post->created_at->format('d/m/Y H:i'),
                    'published_at' => $post->published_at?->format('d/m/Y H:i'),
                    'time_ago' => $post->created_at->diffForHumans(),
                ];
            });

        // Contactos recientes con más detalles
        $recentContacts = Contact::latest()
            ->take(8)
            ->get()
            ->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'phone' => $contact->phone,
                    'company' => $contact->company,
                    'subject' => $contact->subject,
                    'message' => substr($contact->message, 0, 100) . (strlen($contact->message) > 100 ? '...' : ''),
                    'status' => $contact->status,
                    'status_text' => $contact->status_text,
                    'status_class' => $contact->status_class,
                    'created_at' => $contact->created_at->format('d/m/Y H:i'),
                    'time_ago' => $contact->created_at->diffForHumans(),
                    'browser_info' => $contact->browser_info,
                    'ip_address' => $contact->ip_address,
                ];
            });

        // Estadísticas de los últimos 30 días
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $sevenDaysAgo = Carbon::now()->subDays(7);

        $periodStats = [
            'posts_last_30_days' => BlogPost::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'posts_last_7_days' => BlogPost::where('created_at', '>=', $sevenDaysAgo)->count(),
            'contacts_last_30_days' => Contact::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'contacts_last_7_days' => Contact::where('created_at', '>=', $sevenDaysAgo)->count(),
            'views_last_30_days' => BlogPost::where('created_at', '>=', $thirtyDaysAgo)->sum('views'),
            'views_last_7_days' => BlogPost::where('created_at', '>=', $sevenDaysAgo)->sum('views'),
        ];

        // Posts más populares
        $popularPosts = BlogPost::with(['category'])
            ->published()
            ->orderBy('views', 'desc')
            ->take(8)
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'views' => $post->views,
                    'category' => $post->category?->name,
                    'category_color' => $post->category?->color,
                    'published_at' => $post->published_at?->format('d/m/Y'),
                    'url' => route('blog.show', $post->slug),
                ];
            });

        // Categorías con estadísticas
        $topCategories = Category::withCount(['blogPosts', 'publishedPosts'])
            ->orderBy('blog_posts_count', 'desc')
            ->take(8)
            ->get()
            ->map(function ($category) {
                $totalViews = $category->blogPosts()->sum('views');
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'posts_count' => $category->blog_posts_count,
                    'published_posts_count' => $category->published_posts_count,
                    'total_views' => $totalViews,
                    'avg_views' => $category->blog_posts_count > 0 ? round($totalViews / $category->blog_posts_count) : 0,
                    'color' => $category->color,
                    'active' => $category->active,
                ];
            });

        // Estadísticas mensuales para gráfico (últimos 12 meses)
        $monthlyChartStats = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $startOfMonth = $date->copy()->startOfMonth();
            $endOfMonth = $date->copy()->endOfMonth();

            $postsCount = BlogPost::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $contactsCount = Contact::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $viewsCount = BlogPost::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('views');

            $monthlyChartStats[] = [
                'month' => $date->format('M Y'),
                'month_short' => $date->format('M'),
                'posts' => $postsCount,
                'contacts' => $contactsCount,
                'views' => $viewsCount,
                'total_activity' => $postsCount + $contactsCount,
            ];
        }

        // Actividad reciente (últimas acciones)
        $recentActivity = collect();

        // Agregar posts recientes
        BlogPost::with('user')->latest()->take(5)->get()->each(function ($post) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'post',
                'action' => $post->status === 'published' ? 'publicó' : 'creó',
                'title' => $post->title,
                'user' => $post->user->name,
                'time' => $post->created_at,
                'time_ago' => $post->created_at->diffForHumans(),
                'icon' => 'document',
                'color' => $post->status === 'published' ? 'green' : 'yellow',
            ]);
        });

        // Agregar contactos recientes
        Contact::latest()->take(5)->get()->each(function ($contact) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'contact',
                'action' => 'envió mensaje',
                'title' => $contact->subject,
                'user' => $contact->name,
                'time' => $contact->created_at,
                'time_ago' => $contact->created_at->diffForHumans(),
                'icon' => 'mail',
                'color' => 'blue',
            ]);
        });

        // Ordenar por tiempo y tomar los 10 más recientes
        $recentActivity = $recentActivity->sortByDesc('time')->take(10)->values();

        // Estadísticas de rendimiento
        $performanceStats = [
            'most_viewed_post' => BlogPost::published()->orderBy('views', 'desc')->first(),
            'most_active_category' => Category::withCount('publishedPosts')->orderBy('published_posts_count', 'desc')->first(),
            'busiest_day' => Contact::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->orderBy('count', 'desc')
                ->first(),
            'avg_contacts_per_day' => round(Contact::count() / max(1, Contact::oldest()->first()?->created_at?->diffInDays(now()) ?? 1)),
        ];

        return Inertia::render('Admin/Dashboard', [
            'stats' => $stats,
            'periodStats' => $periodStats,
            'monthlyStats' => $monthlyChartStats,
            'recentPosts' => $recentPosts,
            'recentContacts' => $recentContacts,
            'popularPosts' => $popularPosts,
            'topCategories' => $topCategories,
            'recentActivity' => $recentActivity,
            'performanceStats' => $performanceStats,
        ]);
    }
}
