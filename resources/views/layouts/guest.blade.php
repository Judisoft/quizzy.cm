<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('backend/js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <footer>
            <div class="flex justify-center sm:items-center">
                <div class="ml-4 pt-2 text-center fixed bottom-0 py-3 text-sm text-gray-500 sm:text-right sm:ml-0 opacity-75">
                    &copy; 2023 Quizzy  | Powered by StudentPortal-CM
                </div>
            </div>
        </footer>
    </body>
</html>
