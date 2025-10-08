NUEVO MENSAJE DE CONTACTO
========================================

Has recibido una nueva solicitud de contacto desde tu sitio web.

INFORMACIÓN DEL CONTACTO:
----------------------------------------

Nombre: {{ $contact->name }}
Email: {{ $contact->email }}
@if($contact->phone)
Teléfono: {{ $contact->phone }}
@endif
@if($contact->company)
Empresa: {{ $contact->company }}
@endif

ASUNTO:
{{ $contact->subject }}

MENSAJE:
----------------------------------------
{{ $contact->message }}
----------------------------------------

INFORMACIÓN ADICIONAL:
Fecha: {{ $contact->created_at->format('d/m/Y H:i:s') }}
Dirección IP: {{ $contact->ip_address ?? 'No disponible' }}
Navegador: {{ $contact->browser_info }}

@if(config('app.url'))
Ver en el panel de administración:
{{ config('app.url') }}/admin/contacts/{{ $contact->id }}
@endif

========================================
{{ config('app.name') }}

Este correo fue enviado automáticamente desde tu sistema de contacto.
Puedes responder directamente a este correo para contactar con {{ $contact->name }}.