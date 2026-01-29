<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PT Gerbang NTB Emas')</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Optional: future JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 antialiased overflow-x-hidden">

    {{-- NAVBAR --}}
    @include('user.component.navbar')

    {{-- MAIN CONTENT --}}
    <main class="overflow-x-hidden">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('user.component.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // Durasi animasi dalam milidetik
            once: true,    // Animasi hanya terjadi sekali saat scroll ke bawah
            offset: 100,   // Jarak trigger animasi dari bawah layar
        });
    </script>
@stack('scripts')
</body>
</html>
