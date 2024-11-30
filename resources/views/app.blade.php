<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/logo_min.ico') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <base href="/" />
    <meta name="rating" content="General" />   
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="index,follow" />
    <meta name="google" content="nositelinkssearchbox" />
    <meta name="google" content="notranslate" />   
    <meta name="robots" content="max-snippet:20, max-image-preview:large" />    
    <meta name="author" content="SysifosWeb Soluciones Informáticas Limitada" />
    <meta name="robots" content="max-snippet:20, max-image-preview:large" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <meta
    property="og:description"
    content="Desarrollamos tu pagina web y software personalizados para tu negocio. Aumenta tus ventas, mejora la experiencia de tus clientes, Contactanos!"
  />
  <meta name="author" content="SysifosWeb Soluciones Informáticas Limitada" />
 
    @viteReactRefresh
    @vite('resources/js/app.jsx')
    @inertiaHead
  </head>
  <body>
    @inertia
    <div id="app"></div>
  </body>
</html>