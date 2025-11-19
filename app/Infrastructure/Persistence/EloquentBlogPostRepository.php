<?php

namespace App\Infrastructure\Persistence;

use App\Domain\BlogPosts\BlogPostRepositoryInterface;
use App\Domain\BlogPosts\Entities\BlogPost;
use App\Models\BlogPost as EloquentBlogPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class EloquentBlogPostRepository implements BlogPostRepositoryInterface
{
   private function toDomain(EloquentBlogPost $model): BlogPost
    {
        return new BlogPost(
            id: $model->id,
            title: $model->title,
            slug: $model->slug,
            content: $model->content,
            featured_image: $model->featured_image,
            featured: $model->featured,
            status: $model->status,
            published_at: $model->published_at,
            category_id: $model->category_id,
            user_id: $model->user_id,
        );
    }

    
    public function create(array $data): BlogPost
    {
        try {                        
            $model = EloquentBlogPost::create($data);
            return $this->toDomain($model);
        } catch (\Exception $e) {
            throw new \Exception('Error creating blog post: ' . $e->getMessage());
        }
        
    }
    

}