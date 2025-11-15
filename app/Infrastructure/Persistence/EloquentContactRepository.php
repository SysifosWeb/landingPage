<?php

namespace App\Infrastructure\Persistence;

use App\Models\Contact as EloquentContact;
use App\Domain\Contacts\ContactRepositoryInterface;
use App\Domain\Contacts\Entities\Contact as DomainContact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;



/**
 * Implementación concreta de ContactRepositoryInterface usando Eloquent.
 *
 * Esta clase se encarga de interactuar con la base de datos para las
 * operaciones CRUD de Contact. Utiliza el modelo Contact para mapear
 * los datos y proporcionar una abstracción de persistencia.
 */
class EloquentContactRepository implements ContactRepositoryInterface
{
    private function toDomain(EloquentContact $model): DomainContact
    {
        return new DomainContact(
            id: $model->id,
            name: $model->name,
            email: $model->email,
            phone: $model->phone,
            company: $model->company,
            subject: $model->subject,
            message: $model->message,
            status: $model->status,
            ip_address: $model->ip_address,
            user_agent: $model->user_agent,
            metadata: $model->metadata,
            read_at: $model->read_at,
            replied_at: $model->replied_at,
        );
    }
    /**
     * Crea un contacto y devuelve la entidad de dominio.
     *
     * @param string $name Nombre del contacto
     * @param string $email Email del contacto
     * @param string $phone Telefono del contacto
     * @param string $company Compañia del contacto
     * @param string $subject Asunto del contacto
     * @param string $message Mensaje del contacto
     * @param string $status Estado del contacto
     * @param string $ip_address Direccion IP del contacto
     * @param string $user_agent User agent del contacto
     * @param string $metadata Metadatos del contacto
     * @param string $read_at Fecha de lectura del contacto
     * @param string $replied_at Fecha de respuesta del contacto
     * @return Contact Entidad de dominio Contact creada
     */

     
    public function create(array $data): DomainContact
    {
        $model = new EloquentContact();
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->phone = $data['phone'];
        $model->company = $data['company'];
        $model->subject = $data['subject'];
        $model->message = $data['message'];
        $model->status = $data['status'];
        $model->ip_address = $data['ip_address'];
        $model->user_agent = $data['user_agent'];
        $model->metadata = $data['metadata'];
        $model->read_at = $data['read_at'];
        $model->replied_at = $data['replied_at'];
        $model->save();
        return $this->toDomain($model);
    }
    /**
     * Busca por id (o null si no existe).
     *
     * @param int $id Identificador del contacto
     * @return Contact|null Entidad de dominio Contact o null si no existe
     */
    public function getById(int $id): ?DomainContact
    {
        try {
            $model = EloquentContact::findOrFail($id);
            return $this->toDomain($model);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
    /**
     * Obtiene todos los contactos.
     *
     * @return Contact[] Array de entidades de dominio Contact
     */
    public function getAll(): array
    {
        $models = EloquentContact::all();
        return $models->map(fn ($model) => $this->toDomain($model))->toArray();
    }
    /**
     * Marca como leído.
     *
     * @param int $id Identificador del contacto
     */
    public function markAsRead(int $id): void
    {
        EloquentContact::where('id', $id)->update(['status' => 'read', 'read_at' => now()]);
    }
    /**
     * Marca como respondido.
     *
     * @param int $id Identificador del contacto
     */
    public function markAsReplied(int $id): void
    {
        EloquentContact::where('id', $id)->update(['status' => 'replied', 'replied_at' => now()]);
    }
    
     public function hasValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public function getBrowserInfoAttribute(): string
    {
        $userAgent = EloquentContact::all()->user_agent;
        $browser = 'Unknown';
        $os = 'Unknown';
        $device = 'Unknown';
        if (preg_match('/(Windows|Macintosh|Linux|Android|iPhone|iPad)/i', $userAgent, $matches)) {
            $os = $matches[1];
        }
        if (preg_match('/(Firefox|MSIE|Trident|Edge|Opera|Chrome|Safari)/i', $userAgent, $matches)) {
            $browser = $matches[1];
        }
        if (preg_match('/(Mobile|Tablet)/i', $userAgent, $matches)) {
            $device = $matches[1];
        }
        return "{$browser} on {$os} ({$device})";
    }
    /**
     * Obtiene texto del estado.
     *
     * @return string Texto descriptivo del estado
     */
    public function getStatusTextAttribute(): string
    {
        $status = EloquentContact::all()->status;
        return match ($status) {
            'new' => 'Nuevo',
            'read' => 'Leído',
            'replied' => 'Respondido',
            default => 'Desconocido',
        };
    }
    public function isRead(): bool
    {
         $status = EloquentContact::all()->status;
        return $status === 'read';
    }
    public function isReplied(): bool
    {
        $status = EloquentContact::all()->status;
        return $status === 'replied';
    }
    public function isNew(): bool
    {
        $status = EloquentContact::all()->status;
        return $status === 'new';
    }
    public function getTimeAgoAttribute(): string
    {
        $createdAt = EloquentContact::all()->created_at;
        return $createdAt->diffForHumans();
    }

}