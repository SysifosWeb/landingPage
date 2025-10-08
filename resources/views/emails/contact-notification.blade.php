<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Contacto</title>
  <style>
    body {
      font-family: 'Arial', 'Helvetica', sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      background: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 30px 20px;
      text-align: center;
    }

    .header h1 {
      margin: 0;
      font-size: 24px;
      font-weight: 600;
    }

    .header p {
      margin: 10px 0 0;
      font-size: 14px;
      opacity: 0.9;
    }

    .content {
      padding: 30px 20px;
    }

    .field {
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #e5e7eb;
    }

    .field:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .field-label {
      font-weight: 600;
      color: #667eea;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 5px;
    }

    .field-value {
      color: #333;
      font-size: 15px;
      word-wrap: break-word;
    }

    .message-box {
      background-color: #f9fafb;
      border-left: 4px solid #667eea;
      padding: 15px;
      border-radius: 4px;
      margin-top: 10px;
    }

    .info-box {
      background-color: #eff6ff;
      border-radius: 6px;
      padding: 15px;
      margin-top: 20px;
      font-size: 13px;
    }

    .info-box .info-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;
    }

    .info-box .info-item:last-child {
      margin-bottom: 0;
    }

    .info-label {
      color: #6b7280;
      font-weight: 500;
    }

    .info-value {
      color: #374151;
    }

    .footer {
      background-color: #f9fafb;
      padding: 20px;
      text-align: center;
      font-size: 12px;
      color: #6b7280;
    }

    .button {
      display: inline-block;
      padding: 12px 24px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white !important;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      margin-top: 15px;
    }

    .button:hover {
      opacity: 0.9;
    }

    .emoji {
      font-size: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>🔔 Nuevo Mensaje de Contacto</h1>
      <p>Has recibido una nueva solicitud de contacto desde tu sitio web</p>
    </div>

    <div class="content">
      <div class="field">
        <div class="field-label">👤 Nombre</div>
        <div class="field-value">{{ $contact->name }}</div>
      </div>

      <div class="field">
        <div class="field-label">📧 Correo Electrónico</div>
        <div class="field-value">
          <a href="mailto:{{ $contact->email }}" style="color: #667eea; text-decoration: none;">
            {{ $contact->email }}
          </a>
        </div>
      </div>

      @if($contact->phone)
      <div class="field">
        <div class="field-label">📱 Teléfono</div>
        <div class="field-value">
          <a href="tel:{{ $contact->phone }}" style="color: #667eea; text-decoration: none;">
            {{ $contact->phone }}
          </a>
        </div>
      </div>
      @endif

      @if($contact->company)
      <div class="field">
        <div class="field-label">🏢 Empresa</div>
        <div class="field-value">{{ $contact->company }}</div>
      </div>
      @endif

      <div class="field">
        <div class="field-label">📋 Asunto</div>
        <div class="field-value">{{ $contact->subject }}</div>
      </div>

      <div class="field">
        <div class="field-label">💬 Mensaje</div>
        <div class="message-box">
          {{ $contact->message }}
        </div>
      </div>

      <div class="info-box">
        <div class="info-item">
          <span class="info-label">📅 Fecha:</span>
          <span class="info-value">{{ $contact->created_at->format('d/m/Y H:i:s') }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">🌐 IP:</span>
          <span class="info-value">{{ $contact->ip_address ?? 'No disponible' }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">🖥️ Navegador:</span>
          <span class="info-value">{{ $contact->browser_info }}</span>
        </div>
      </div>

      @if(config('app.url'))
      <div style="text-align: center;">
        <a href="{{ config('app.url') }}/admin/contacts/{{ $contact->id }}" class="button">
          Ver en Panel de Administración
        </a>
      </div>
      @endif
    </div>

    <div class="footer">
      <p><strong>💼 {{ config('app.name') }}</strong></p>
      <p>Este correo fue enviado automáticamente desde tu sistema de contacto.</p>
      <p style="margin-top: 10px;">
        Puedes responder directamente a este correo para contactar con {{ $contact->name }}.
      </p>
    </div>
  </div>
</body>

</html>