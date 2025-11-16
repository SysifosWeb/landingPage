<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contacts\Entities\Contact as DomainContact;

class ContactResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var DomainContact $contact */
        $contact = $this->resource;

        return [
            'id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'company' => $contact->company,
            'subject' => $contact->subject,
            'message' => $contact->message,
            'status' => $contact->status,
            'ip_address' => $contact->ip_address,
            'user_agent' => $contact->user_agent,
            'metadata' => $contact->metadata,
            'read_at' => $contact->read_at,
            'replied_at' => $contact->replied_at,
        ];
    }
}