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
</head>
<body class="antialiased bg-white text-gray-900">
    <div id="public-app" data-page='@json($inertiaPage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)'></div>

    @vite('resources/js/public/public-app.js')
    @stack('scripts')
</body>
</html>
