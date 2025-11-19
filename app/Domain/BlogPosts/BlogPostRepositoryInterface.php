<?php

namespace App\Domain\BlogPosts;

use App\Domain\BlogPosts\Entities\BlogPost;

interface BlogPostRepositoryInterface
{
    // public function all(): array;
    // public function find(int $id): ?BlogPost;
    public function create(array $data): BlogPost;
    
}
