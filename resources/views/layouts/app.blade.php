<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'StudentPortal') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('backend/js/app.js') }}" defer></script>
        <script src="{{ asset('js/quiz.js') }}"></script>
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.17.1/standard-all/ckeditor.js"></script>
        <style>
            .shadow{
                box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px;
            }
        </style>
    </head>
    <body class="font-sans antialiased sm:mx-3" style="background-color:rgb(247, 248, 249);">
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer>
                <div class="flex justify-center sm:items-center">
                    <div class="ml-4 pt-2 text-center bottom-0 pb-3 text-sm text-gray-500 sm:text-right sm:ml-0 opacity-75">
                        <span class="">&copy;<?php echo date("Y"); ?> Quizzy | All rights reserved</span>
                    </div>
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
