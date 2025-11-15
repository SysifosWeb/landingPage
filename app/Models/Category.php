<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'active',
        'sort_order',
    ];

    protected $casts = [
        'active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Relación con posts del blog
     */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    /**
     * Relación con posts (alias para compatibilidad)
     */
    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    /**
     * Relación con posts publicados
     */
    public function publishedPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class)->published();
    }

    /**
     * Scope para categorías activas
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope ordenado por sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    /**
     * Generar slug automáticamente
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = $this->generateUniqueSlug($value);
        }
    }

    /**
     * Generar slug único
     */
    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Obtener URL de la categoría
     */
    public function getUrlAttribute()
    {
        return route('blog.category', $this->slug);
    }

    /**
     * Contar posts publicados
     */
    public function getPublishedPostsCountAttribute()
    {
        return $this->publishedPosts()->count();
    }

    /**
     * Verificar si tiene posts
     */
    public function hasPosts(): bool
    {
        return $this->blogPosts()->exists();
    }

    /**
     * Verificar si tiene posts publicados
     */
    public function hasPublishedPosts(): bool
    {
        return $this->publishedPosts()->exists();
    }

    /**
     * Obtener color con fallback
     */
    public function getColorAttribute($value)
    {
        return $value ?: '#3B82F6';
    }
}