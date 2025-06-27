<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    {{-- Latar Belakang --}}
    <div class="stars"></div>


    {{-- Container utama yang menyatukan sidebar dan konten --}}
    <div class="container">


        {{-- Konten utama untuk halaman tamu --}}
        <main class="main-content">
            {{-- Slot ini akan diisi oleh konten dari welcome.blade.php, login.blade.php, dll. --}}
            {{-- Div ini membantu konten (seperti form) berada di tengah. --}}
            <div class="w-full h-full flex items-center justify-center p-4">
                {{ $slot }}
            </div>
        </main>

    </div>
</body>

</html>
