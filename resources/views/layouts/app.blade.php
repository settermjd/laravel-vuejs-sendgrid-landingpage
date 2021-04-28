<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <title>Laravel Landing Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="antialiased sm:subpixel-antialiased md:antialiased">
<div id="content" class="content">
    @yield('content')
</div>
</body>
</html>
