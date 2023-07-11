<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Pacifico&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=DynaPuff:wght@300&family=Josefin+Sans:wght@700&family=Libre+Baskerville:wght@700&family=Pacifico&family=Rowdies:wght@300&display=swap');
</style>
<div class="responsive-header">
    <div class="res-logo">
        <button style="font-family: 'Libre Baskerville', serif;height:45px;width:45px;padding:2px;background-color: #4267B2;color:#fff;font-size: 28px;border-radius: 5px;border:#e5e7eb;">Q</button>
        <a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #4267B2;font-size: 26px;">
            Quizzy
        </a>
    </div>
    <div class="right-compact">
        <div class="menu-area">
            <div id="nav-icon3">
                <i class=""><svg id="menu-btn" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></i>
            </div>
            <ul class="drop-menu">
                <li><a title="profile.html" href="{{ route('profile.show') }}"><i class="icofont-user"></i>My account</a></li>
                <li><a title="" href="{{ route('help') }}"><i class="icofont-question-circle"></i>Help</a></li>
                <li><a title="" href="{{ route('logout') }}" class="logout" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="icofont-logout"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <div class="res-search">
            <span><i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></i></span>
        </div>
    </div>
    <div class="restop-search pt-2">
        <span class="hide-search pt-1"><i class="icofont-close"></i></span>
        <form>
            <input type="text" placeholder="Search">
        </form>
    </div>
</div><!-- responsive header -->

<header class="">
    <div class="topbar stick">
        <div class="logo">
            <button style="font-family: 'Libre Baskerville', serif;height:45px;width:45px;padding:2px;background-color: #4267B2;color:#fff;font-size: 28px;border-radius: 5px;border:#e5e7eb;">Q</button>
            <a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #4267B2;font-size: 26px;">
                Quizzy
            </a>
        </div>
        <div class="searches">
            <form method="#">
                <input type="text" placeholder="Search">
                <button type="submit"><i class="icofont-search"></i></button>
            </form>
        </div>
        <ul class="web-elements">
            <li>
                <div class="user-dp">
                    <a href="{{ route('profile.show') }}" title="">
                        <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
                        <div class="name">
                            <h4>{{auth()->user()->name}}</h4>
                        </div>
                    </a>	
                </div>
            </li>
            <li>
                <a title="" href="#">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </i>
                </a>
                <ul class="dropdown">
                    <li><a href="{{ route('profile.show') }}" title=""><i class="icofont-user-alt-3"></i> My Account</a></li>
                    <li><a href="{{ route('create.quiz') }}" title=""><i class="icofont-plus"></i> Create Quiz</a></li>
                    <li><a href="{{route('plans')}}" title=""><i class="icofont-flash"></i> Upgrade</a></li>
                    <li><a href="{{ route('help') }}" title=""><i class="icofont-question-circle"></i> Help</a></li>
                    <li><a href="#" title=""><i class="icofont-gear"></i> Setting</a></li>
                    <li><a href="{{ route('policy.show') }}" title=""><i class="icofont-notepad"></i> Privacy</a></li>
                    <li class="logout"><a href="{{ route('logout') }}" title="" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="icofont-power"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    
</header><!-- header -->

<div class="top-sub-bar border-bottom pt-2" style="background-color:#e5e5e5;">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="menu-btn">
                    <img src="{{ asset('images/resources/m1.png') }}" class="menu-img" alt="">
                </div>
            </div>
            <div class="">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}" title="" class="px-2">
                            <img src="{{ asset('images/resources/m7.png') }}" class="menu-img" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('create.question') }}" title="Questions" class="px-2">
                            <img src="{{ asset('images/resources/m8.png') }}" class="menu-img" alt="Add question">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('create.quiz') }}" title="" class="px-2">
                            <img src="{{ asset('images/resources/m4.png') }}" class="menu-img" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all.questions') }}" title="" class="px-2">
                            <img src="{{ asset('images/resources/m11.png') }}" class="menu-img" alt="Questions">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all.quizzes') }}" title="" class="px-2">
                            <img src="{{ asset('images/resources/m6.png') }}" class="menu-img" alt="Questions">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.show') }}" title="Questions" class="px-2">
                            <img src="{{ asset('images/resources/m3.png') }}" class="menu-img" alt="User profile">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mx-auto mt-2 mb-2">
            @if(Session::has('message'))
            <div class="rounded" style="background-color: #bce0ef; border:1px solid #4267B2;" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p class="text-dark">{{ Session::get('message') }}</p>
            </div>
            @endif
            
            @if(Session::has('error'))
            <div class="rounded" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p class="text-danger">{{ Session::get('error') }}</p>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="rounded" style="border:1px solid #36b37e;background-color: #d7f0e5;" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p style="color:#36b37e;font-weight:500;">{{ Session::get('success') }}</p>
            </div>
            @endif
        </div>
    </div>	
</div>
<!-- top sub bar -->