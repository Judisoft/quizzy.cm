<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Quizzy</title>
    <link rel="icon" href="{{ asset('backend/images/fav.html') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{asset('backend/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('backend/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('backend/js/app.js') }}" defer></script>
    <script src="{{ asset('backend/js/quiz.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/dayjs.min.js" integrity="sha512-Ot7ArUEhJDU0cwoBNNnWe487kjL5wAOsIYig8llY/l0P2TUFwgsAHVmrZMHsT8NGo+HwkjTJsNErS6QqIkBxDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/plugin/relativeTime.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.tiny.cloud/1/15ft7jdy5iwyy8hx0v63rulv4mstmzl2fvn83kwh5om2yzhc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
{{-- <div class="page-loader" id="page-loader">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    <span>Loading...</span>
</div><!-- page loader --> --}}
    
    <div class="theme-layout">
        @include('layouts.dashboard.top-nav')
        @include('layouts.dashboard.side-nav')
    </div>
    @yield('content')
@livewireScripts
@yield('page_scripts')
<script src="{{asset('backend/js/main.min.js')}}"></script>
<script src="{{asset('backend/js/uikit.min.js')}}"></script>
<script src="{{asset('backend/js/vivus.min.js')}}"></script>
<script src="{{asset('backend/js/script.js')}}"></script>
</body>
</html>