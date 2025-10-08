<!DOCTYPE html>
<html>

<head>
  <title>SysifosWeb</title>
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  @vite('resources/js/app.js')
  @vite('resources/css/app.css')
  @inertiaHead
</head>

<body>
  @inertia
</body>

</html>