<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Categories\Entities\Category as DomainCategory;

class CreateResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var DomainCategory $this */
           

        return [
            'id' => $this->id,
            'message' => 'Categoría creada con éxito',           
        ];
    }
}
