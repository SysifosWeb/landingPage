<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contacts\Entities\Contact as DomainContact;

class RegisterContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var DomainContact $contact */
        $contact = $this->resource;

        return [           
            'message' => 'contacto '.$contact->name.' ha sido registrado con éxito',            
        ];
    }
}
