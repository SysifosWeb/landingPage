<?php

namespace App\Application\BlogPosts;

use App\Domain\BlogPosts\BlogPostRepositoryInterface;
use App\Domain\BlogPosts\Entities\BlogPost;

Class Create
{
    public function __construct(
        private readonly BlogPostRepositoryInterface $blogPosts,
    ) {}

    public function handle(array $data): BlogPost
    {
        return $this->blogPosts->create($data);        
    }
}
