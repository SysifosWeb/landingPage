<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\BlogController;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

// Rutas públicas
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/nosotros', function () {
    return Inertia::render('About');
});

Route::get('/servicios', function () {
    return Inertia::render('Services');
});

Route::get('/contacto', function () {
    return Inertia::render('Contact');
});

Route::get('/portfolio', function () {
    return Inertia::render('Portfolio');
});

// Rutas del blog público
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', function ($slug) {
    $post = BlogPost::with(['user', 'category'])
        ->where('slug', $slug)
        ->published()
        ->firstOrFail();

    $post->incrementViews();

    // Transformar el campo featured_image en el post principal
    if ($post->featured_image) {
        $post->featured_image = Storage::url($post->featured_image);
    }

    $relatedPosts = BlogPost::published()
        ->where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->take(3)
        ->get();

    // Transformar el campo featured_image en los posts relacionados
    $relatedPosts->transform(function ($relatedPost) {
        if ($relatedPost->featured_image) {
            $relatedPost->featured_image = Storage::url($relatedPost->featured_image);
        }
        return $relatedPost;
    });

    return Inertia::render('BlogPost', [
        'post' => $post,
        'relatedPosts' => $relatedPosts,
    ]);
})->name('blog.show');

Route::get('/blog/categoria/{slug}', function ($slug) {
    $category = Category::where('slug', $slug)->active()->firstOrFail();

    $posts = BlogPost::with(['user', 'category'])
        ->where('category_id', $category->id)
        ->published()
        ->latest('published_at')
        ->paginate(12);

    return Inertia::render('BlogCategory', [
        'category' => $category,
        'posts' => $posts,
    ]);
})->name('blog.category');

// Formulario de contacto
Route::post('/contacto', [ContactFormController::class, 'store'])->name('contact.store');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de administración (protegidas)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Gestión de posts
    Route::resource('posts', BlogPostController::class);
    Route::post('posts/{post}/toggle-featured', [BlogPostController::class, 'toggleFeatured'])->name('posts.toggle-featured');
    Route::post('posts/{post}/publish', [BlogPostController::class, 'publish'])->name('posts.publish');
    Route::post('posts/{post}/unpublish', [BlogPostController::class, 'unpublish'])->name('posts.unpublish');

    // Gestión de categorías
    Route::resource('categories', CategoryController::class);
    Route::post('categories/{category}/toggle-active', [CategoryController::class, 'toggleActive'])->name('categories.toggle-active');

    // Gestión de contactos
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    Route::post('contacts/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::post('contacts/{contact}/mark-replied', [ContactController::class, 'markAsReplied'])->name('contacts.mark-replied');
    Route::post('contacts/{contact}/archive', [ContactController::class, 'archive'])->name('contacts.archive');
    Route::post('contacts/bulk-action', [ContactController::class, 'bulkAction'])->name('contacts.bulk-action');
});
