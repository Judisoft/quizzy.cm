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
<style>
	@media (max-width: 576px) { 
		.quiz-list {
			display: none;
		}
	 }
</style>
<body class="bg-light">
<div class="page-loader" id="page-loader">
  <div class="loader">
  	<span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span>
  </div>
</div><!-- page loader -->
<div class="theme-layout" style="overflow-x:hidden !important;">
	<div class="responsive-header">
		<div class="logo">
            <a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #4267B2;font-size: 24px;">
				<button style="font-family: 'Libre Baskerville', serif;height: 38px;width: 38px; padding: 1px;background-color: #4267B2; border:none;color:#fff;font-size: 24px;border-radius: 5px;">Q</button>
				Quizzy
			</a>
		</div>
		<div class="right-compact">
			<div class="sidemenu">
				<i><svg id="side-menu2" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></i>
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
	<header class="transparent">
		<div class="topbar">
			<div class="logo">
				<a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #fff;font-size: 24px;">
					<button style="font-family: 'Libre Baskerville', serif;height: 38px;width: 38px; padding: 1px;background-color: #4267B2; border:none;color:#fff;font-size: 24px;border-radius: 5px;">Q</button>
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
				<li><a href="{{ route('help') }}" title="">help center</a></li>
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
					<svg id="team" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg></i> Plans
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
	<section>
		<div class="gap overlap nogap mate-black medium-opacity">
			<div class="bg-image" style="background-image: url(images/resources/community.png)"></div>
			<div class="feature-meta mt-3">
				<h1 class="text-left" style="font-size:44px;font-weight:700;">Quizzy <span>Community</span> <br> <small style="font-size:24px;">Ask . Connect . Learn</small></h1>
			</div>
		</div>	
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="mx-auto mt-2">
						@if(Session::has('error'))
						<div class="notification-box">
							<ul>
								<li>
									<p class="text-danger text-center py-4 p-2 rounded" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);">
										{{ Session::get('error') }}
									</p>
									<i class="del icofont-close pt-4 text-danger" title="Remove"></i>
								</li>
							</ul>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap mt-3">
			<div class="container">
				<div class="row remove-ext30" style="border-radius:5px;">
					<div class="col-lg-12">
						<div class="title">
							<h1 style="font-weight:900;">Welcome to <span style="color:#4267B2;text-decoration:underline;">Quizzy</span> Community!</h1>
						</div>
                        <p class="text-center">Quizzy  community offers thousands of
                            quizzies, questions, <br> and answers to questions on a wide
                            range of topics. Unsure where to start? <br>
							You can start by browsing through our prepared quizzes.
                        </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3">
						<div class="bg-light p-5 quiz-list" style="border-radius:10px;">
							<h5 class="mb-3 fw-500">Quizzes</h5>
							@foreach ($quizzies->take(20) as $quiz)
								<p><a href="{{ route('display.quiz', $quiz) }}" class="text-primary">{{ $quiz->title }}</a></p>
							@endforeach
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<div class="search-section help-bg rounded">
							<h1 style="font-weight:700;">Find Quizzes</h1>
							<form action="{{ route('community') }}" method="get">
								<input type="text" name="search" placeholder="Search Quizzes" value="{{ old('search') }}">
								<button><i class="icofont-search"></i></button>
							</form>
							<p>
								Popular quizzes: 
								@foreach ($top_quizzes as $quiz)
								<a href="{{ route('display.quiz', $quiz) }}" class="">{{ $quiz->title }}</a>
								@endforeach
							</p>
						</div>
						<div class="py-4">
							@if($is_search)
								<h1 style="font-weight:700;">Search Result</h1>
							@else
								<h1 style="font-weight:700;">Featured Quizzes</h1>
							@endif
						</div>
						@forelse ($quizzies as $quiz)
							<div class="main-wraper">
								<div class="friend-info">
									<div class="more">
										<div class="more-post-optns">
											<i class="">
												<svg class="feather feather-more-horizontal" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><circle r="1" cy="12" cx="12"/><circle r="1" cy="12" cx="19"/><circle r="1" cy="12" cx="5"/></svg>
											</i>
										</div>
									</div>
									<figure>
										<img src="{{ $quiz->user->profile_photo_url }}" alt="">
									</figure>
									<div class="friend-name pb-3 border-bottom">
										<ins><a href="{{ route('user.profile', $quiz->user->id) }}" title="">{{ $quiz->user->name }}</a></ins>
										<span><i class="icofont-globe"></i> published: {{ $quiz->created_at->diffForHumans() }}</span>
									</div>
									<div class="question-meta">
										<div class="d-flex flex-row">
											<div class="p-2">
												<img src="{{ asset('images/resources/quiz3.png') }}" class="img-sm">
											</div>
											<div class="p-2 friend-name">
												<h4><a href="{{ route('display.quiz', $quiz) }}" title="">{{ ucfirst(strtolower($quiz->title)) }}</a></h4>
												<p class="text-secondary"><a>{{ $quiz->subject->title }}</a></p>
											</div>
										</div>
										<div class="">
											@foreach ($quiz->questions->take(5) as $key=>$question)
												<div class="bg-light border rounded my-2">
													<div class="d-flex flex-column">
														<div class="p-2">
															<h6 class="text-secondary p-2">Question {{ $key + 1 }}: </h6>
														</div>
														<div class="p-2">
															<h6>{!! $question->content !!}</h6>
														</div>
													</div>
													<ol type="A">
														<li>{!! $question->A !!}</li>
														<li>{!! $question->B !!}</li>
														<li>{!! $question->C !!}</li>
														<li>{!! $question->D !!}</li>
													</ol>
												</div>
											@endforeach
										</div>
										<ul class="tags">
											<li><a data-ripple="" title="">{{ $question->topic->topic }}</a></li>
											<li><a data-ripple="" title="">{{ $quiz->number_of_likes }} likes</a></li>
											<li><a data-ripple="" title="">{{ $quiz->views }} views</a></li>
											<li><a data-ripple="" title="">{{ $quiz->questions->count()}} questions</a></li>
										</ul>
										<a href="{{ route('display.quiz', $quiz) }}" title="" class="main-btn">Take Quiz</a>
									</div>	
								</div>
							</div>
						@empty
						<div class="main-wrapper">
							<p class="text-center">
								No quiz available
							</p>
						</div>
						@endforelse
						<div class="py-3 text-center">{{ $quizzies->links('pagination::bootstrap-4') }}</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('layouts.frontend.footer')
</div>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="js/main.min.js"></script>
	<script src="js/counterup.min.js"></script>
	<script src="js/counterup-t-waypoint.js"></script>
	<script src="js/typed.js"></script>
	<script src="js/script.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
	  AOS.init();
	</script>
</body>	
</html>