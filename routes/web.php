<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogPostController as AdminBlogPostController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/nosotros', [AboutController::class, 'index']);

Route::get('/servicios', [ServicesController::class, 'index']);

Route::get('/contacto', [ContactController::class, 'index']);

Route::get('/portfolio', [PortfolioController::class, 'index']);

// Rutas del blog público
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogPostController::class, 'show'])->name('blog.show');

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
    Route::resource('posts', AdminBlogPostController::class);
    Route::post('posts/{post}/toggle-featured', [AdminBlogPostController::class, 'toggleFeatured'])->name('posts.toggle-featured');
    Route::post('posts/{post}/publish', [AdminBlogPostController::class, 'publish'])->name('posts.publish');
    Route::post('posts/{post}/unpublish', [AdminBlogPostController::class, 'unpublish'])->name('posts.unpublish');

    // Gestión de categorías
    Route::resource('categories', CategoryController::class);
    Route::post('categories/{category}/toggle-active', [CategoryController::class, 'toggleActive'])->name('categories.toggle-active');

    // Gestión de contactos
    Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);
    Route::post('contacts/{contact}/mark-read', [AdminContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::post('contacts/{contact}/mark-replied', [AdminContactController::class, 'markAsReplied'])->name('contacts.mark-replied');
    Route::post('contacts/{contact}/archive', [AdminContactController::class, 'archive'])->name('contacts.archive');
    Route::post('contacts/bulk-action', [AdminContactController::class, 'bulkAction'])->name('contacts.bulk-action');
});
