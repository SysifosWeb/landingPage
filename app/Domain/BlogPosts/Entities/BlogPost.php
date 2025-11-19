<?php

namespace App\Domain\BlogPosts\Entities;


Class BlogPost
{
    public function __construct(
        public int $id,
        public string $title,
        public string $slug,
        public string $content,
        public string $featured_image,
        public bool $featured,
        public string $status,
        public string $published_at,
        public int $category_id,
        public int $user_id,    
    ) {}
}





?>