<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    /**
     * Mostrar un post individual del blog
     */
    public function show($slug)
    {
        $post = BlogPost::with(['user', 'category'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $post->incrementViews();

        // Transformar el campo featured_image en el post principal
        if ($post->featured_image) {
            $post->featured_image = Storage::url($post->featured_image);
        }

        // Obtener posts relacionados
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Si no hay suficientes posts relacionados de la misma categoría, obtener otros
        if ($relatedPosts->count() < 3) {
            $additionalPosts = BlogPost::published()
                ->where('id', '!=', $post->id)
                ->whereNotIn('id', $relatedPosts->pluck('id'))
                ->orderBy('published_at', 'desc')
                ->limit(3 - $relatedPosts->count())
                ->get();

            $relatedPosts = $relatedPosts->merge($additionalPosts);
        }

        // Transformar el campo featured_image en posts relacionados
        $relatedPosts->transform(function ($relatedPost) {
            if ($relatedPost->featured_image) {
                $relatedPost->featured_image = Storage::url($relatedPost->featured_image);
            }
            return $relatedPost;
        });

        // Generar metadatos SEO dinámicos
        $seoData = [
            'title' => ($post->meta_title ?: $post->title) . ' - SysifosWeb',
            'description' => $post->meta_description ?: $post->excerpt,
            'keywords' => $this->generateDynamicKeywords($post),
            'canonical' => 'https://sysifosweb.cl/blog/' . $post->slug,
            'og_type' => 'article',
            'og_image' => $post->featured_image ?: 'https://sysifosweb.cl/img/og-blog-default.jpg',
            'twitter_card' => 'summary_large_image',
            'article_author' => $post->user->name ?? 'SysifosWeb',
            'article_published_time' => $post->published_at ? $post->published_at->toISOString() : $post->created_at->toISOString(),
            'article_modified_time' => $post->updated_at->toISOString(),
            'article_section' => $post->category->name ?? 'General'
        ];

        if (config('app.use_blade_public_views')) {
            return view('public.blog-post', [
                'post' => $post->toArray(),
                'relatedPosts' => $relatedPosts->toArray(),
                'seo' => $seoData,
            ]);
        }

        return Inertia::render('BlogPost', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'seo' => $seoData
        ]);
    }

    /**
     * Generar keywords dinámicas basadas en el contenido del post
     */
    private function generateDynamicKeywords($post)
    {
        $provided = [];

        if ($post->meta_keywords) {
            // Si meta_keywords es un array, usarlo directamente
            if (is_array($post->meta_keywords)) {
                $provided = array_map('trim', $post->meta_keywords);
            } else {
                // Si es un string, hacer explode
                $provided = array_map('trim', explode(',', $post->meta_keywords));
            }
        }

        $fallback = [
            $post->title,
            'blog de desarrollo',
            'desarrollo web',
            'tutorial',
            'guía',
            'mejores prácticas',
            'Laravel',
            'Vue.js',
            'React',
            'SysifosWeb',
        ];

        if ($post->category && $post->category->name) {
            $fallback[] = $post->category->name;
        }

        $unique = array_unique(array_merge($provided, $fallback));
        return implode(', ', array_filter($unique));
    }
}
