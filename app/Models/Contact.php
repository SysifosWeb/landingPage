<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'subject',
        'message',
        'status',
        'ip_address',
        'user_agent',
        'metadata',
        'read_at',
        'replied_at',
    ];

    protected $casts = [
        'metadata' => 'array',
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    /**
     * Scope para contactos nuevos
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Scope para contactos leídos
     */
    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    /**
     * Scope para contactos respondidos
     */
    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }    

    /**
     * Verificar si es nuevo
     */
    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    /**
     * Verificar si fue leído
     */
    public function isRead(): bool
    {
        return in_array($this->status, ['read', 'replied']);
    }

    /**
     * Verificar si fue respondido
     */
    public function isReplied(): bool
    {
        return $this->status === 'replied';
    }

    /**
     * Obtener tiempo transcurrido desde el contacto
     */
    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Obtener clase CSS según el estado
     */
    public function getStatusClassAttribute()
    {
        return match ($this->status) {
            'new' => 'bg-red-100 text-red-800',
            'read' => 'bg-yellow-100 text-yellow-800',
            'replied' => 'bg-green-100 text-green-800',
            'archived' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Obtener texto del estado
     */
    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            'new' => 'Nuevo',
            'read' => 'Leído',
            'replied' => 'Respondido',
            'archived' => 'Archivado',
            default => 'Desconocido',
        };
    }

    /**
     * Validar si el email es válido
     */
    public function hasValidEmail(): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Obtener información del navegador
     */
    public function getBrowserInfoAttribute()
    {
        if (!$this->user_agent) {
            return 'Desconocido';
        }

        // Detectar navegador básico
        if (str_contains($this->user_agent, 'Chrome')) {
            return 'Chrome';
        } elseif (str_contains($this->user_agent, 'Firefox')) {
            return 'Firefox';
        } elseif (str_contains($this->user_agent, 'Safari')) {
            return 'Safari';
        } elseif (str_contains($this->user_agent, 'Edge')) {
            return 'Edge';
        }

        return 'Otro';
    }
}