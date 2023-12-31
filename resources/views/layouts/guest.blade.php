<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Exemple pour Font Awesome 5 (gratuit) -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts

        <script>

document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordVisibilityButton = document.getElementById('togglePasswordVisibility');
    const passwordInput = document.getElementById('password');

    togglePasswordVisibilityButton.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });

    const togglePasswordConfirmationVisibilityButton = document.getElementById('togglePasswordConfirmationVisibility');
    const passwordConfirmationInput = document.getElementById('password_confirmation');

    togglePasswordConfirmationVisibilityButton.addEventListener('click', function () {
        const type = passwordConfirmationInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmationInput.setAttribute('type', type);
    });
});

                </script>
    </body>
</html>
