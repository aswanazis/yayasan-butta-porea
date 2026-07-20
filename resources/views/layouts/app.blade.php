<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yayasan Butta Porea Indonesia')</title>
    <meta name="description" content="@yield('meta_description', 'Membangun kemandirian Warga Binaan Pemasyarakatan melalui program Integrated Urban Farming.')">

     <link rel="icon" type="image/png" href="{{ asset('images/Bplogo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/Bplogo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/Bplogo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-earth-50 text-brand-900 antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>