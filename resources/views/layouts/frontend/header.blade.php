<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>Quizzy</title>
        <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
        
        <link rel="stylesheet" href="css/main.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/color.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Pacifico&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=DynaPuff:wght@300&family=Josefin+Sans:wght@700&family=Libre+Baskerville:wght@700&family=Pacifico&family=Rowdies:wght@300&display=swap');
        </style>
    </head>
<body>
<div class="page-loader" id="page-loader">

  <div class="loader">
	<span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span></div>
</div><!-- page loader -->
<div class="theme-layout" >
	<div class="responsive-header">
		<div class="logo">
			<a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #4267B2;font-size: 24px;">
				<button style="font-family: 'Libre Baskerville', serif;height: 38px;width: 38px; padding: 1px;background-color: #4267B2; border:none;color:#fff;font-size: 24px;border-radius: 5px;">Q</button>
				Quizzy
			</a>
		</div>
		<div class="right-compact">
			<div class="sidemenu">
				<i>
				<svg id="side-menu2" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></i>
			</div>
			<div class="res-search">
				@if(Auth::guest())
					<a href="{{route('login')}}"><span><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="26" width="26" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/></svg></span></a>
				@else
					<a href="{{route('dashboard')}}"><span><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="26" width="26" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/></svg></span></a>
				@endif
			</div>
		</div>
	</div><!-- responsive header -->
	
	<header class="fixed-top">
		<div class="topbar">
			<div class="logo">
                <button style="font-family: 'Libre Baskerville', serif;height:45px;width:45px;padding:2px;background-color: #4267B2;color:#fff;font-size: 28px;border-radius: 5px;border:#e5e7eb;">Q</button>
                <a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #4267B2;font-size: 26px;">
                    Quizzy
                </a>
            </div>
			<ul>
                @if(Auth::check())
					<li><a href="{{ route('dashboard') }}" title="">Dashboard</a></li>
				@endif
				<li><a href="{{ route('community') }}" title="">Community</a></li>
				<li><a href="{{ route('plans') }}" title="">Pricing</a></li>
				<li><a href="{{ route('contact') }}" title="">contact</a></li>
				<li><a href="{{ route('help') }}" title="" >help center</a></li>
				@if(Auth::guest())
					<li><a href="{{route('register')}}" title=""> Sign Up</a></li>
					<li><a class="join-butn" href="{{route('login')}}" title=""><i class="icofont-lock"></i> Login</a></li>
				@endif
				<li><a href="#" title=""><img src="images/flags/US.png" alt=""> En</a></li>
			</ul>
		</div>
	</header>
	<nav class="sidebar">
		<ul class="menu-slide">
			<li class="active menu-item-has-children">
				<a class="" href="{{ route('home') }}" title="">
					<i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></i> Home
				</a>
				<ul class="submenu">
					@if(Auth::check()) <li><a href="{{ route('dashboard') }}" title="">Dashboard</a></li> @endif
					<li><a href="#" title="">Community</a></li>
				</ul>
			</li>
			<li class="menu-item-has-children">
				<a class="" href="#" title="">
					 <i class="">
					<svg id="ab5" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></i> Products
				</a>
				<ul class="submenu">
					<li><a href="#" title="">Medxam</a></li>
				</ul>
			</li>
			<li class="menu-item-has-children">
				<a class="" href="#" title="">
					<svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></i> Support
				</a>
				<ul class="submenu">
					<li><a href="{{ route('contact') }}" title="">Contact</a></li>
					<li><a href="{{ route('help') }}" title="">Help</a></li>
				</ul>
			</li>
			@if(Auth::guest())
				<li class="">
					<a class="" href="{{ route('register') }}" title="">
						<i><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/></svg></i>
						Register
					</a>
				</li>
				<li class="">
					<a class="" href="{{ route('login') }}" title="">
						<i class="">
						<svg id="ab9" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></i> 
						Login
					</a>
				</li>
			@endif
			<li class="">
				<a class="#" href="{{ route('plans') }}" title="">
					<i class="">
					<svg id="team" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg></i> Pricing
				</a>
			</li>
			<li class="menu-item-has-children">
				<a class="" href="messages.html" title="">
					<i class="">
					<svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg" id="ab2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" style="stroke-dasharray: 68, 88; stroke-dashoffset: 0;"/></svg></i> Language
				</a>
				<ul class="submenu">
					<a href="#" title=""><img src="images/flags/US.png" height="14" width="14" alt=""> En</a>
				</ul>
			</li>
			
		</ul>
	</nav><!-- nav sidebar -->