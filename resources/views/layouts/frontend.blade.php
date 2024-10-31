<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-layouts.frontend-navbar />

    <main class="pt-16 px-4 ">
        {{ $slot }}
    </main>

    <x-layouts.frontend-footer />

    <!-- Ikon WhatsApp di pojok kanan bawah -->
    @if ($contact->where('name', 'Whatsapp')->isNotEmpty())
        <a href="{{ $contact->where('name', 'Whatsapp')->first()->link }}" target="_blank" rel="noopener noreferrer"
            class="fixed bottom-4 right-4 bg-green-500 p-3 rounded-full shadow-lg hover:bg-green-600 transition">
            <x-icons.icon type="Whatsapp" class="w-6 h-6 lg:w-12 lg:h-12 fill-current text-white" />
        </a>
    @endif

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
