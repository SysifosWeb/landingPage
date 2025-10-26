@php
    $pageComponent = $pageComponent ?? null;
    if (empty($pageComponent)) {
        throw new \InvalidArgumentException('A valid Inertia component name is required for the public view.');
    }
    $pageProps = $pageProps ?? [];
    $inertiaPage = [
        'component' => $pageComponent,
        'props' => $pageProps,
        'url' => request()->getRequestUri(),
        'version' => null,
    ];
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', config('app.name'))</title>
    @hasSection('meta')
        @yield('meta')
    @endif
    @stack('head')
    @vite('resources/css/app.css')
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3BJ0HZ6RSH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3BJ0HZ6RSH');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TWB2W6T9');</script>
<!-- End Google Tag Manager -->
</head>
<body class="antialiased bg-white text-gray-900">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TWB2W6T9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="public-app" data-page='@json($inertiaPage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)'></div>

    @vite('resources/js/public/public-app.js')
    @stack('scripts')
</body>
</html>
