<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="canonical" href="https://www.sysifosweb.cl/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/logo_min.ico') }}" />
    <meta name="rating" content="General" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="expires" content="43200"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    
    <base href="/" />
    <meta name="google-site-verification" content="VTWOSSGGnktpmu96UQyQ2iQ7TYwRA2NJ8JkWQvH4-Xk" />
    <meta name="keywords" content="sisyfos, sysifos, sysifos web, sysifosweb, Sysifos, Sysifos Web, SysifosWeb, web, Web, sisyfo, sysifo" />           
    <meta name="author" content="SysifosWeb Soluciones Informáticas Limitada" />    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
 
    @viteReactRefresh
    @vite('resources/js/app.jsx')
    @inertiaHead
  </head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3BJ0HZ6RSH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3BJ0HZ6RSH');
</script>
  <body>
    @inertia
    <div id="app"></div>
  </body>
</html>