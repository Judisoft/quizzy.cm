<nav class="sidebar mt-2">
    <ul class="menu-slide">
        <li class="mb-3">
            <a class="button primary text-center" href="{{ route('create.quiz') }}" title="">
               Create Quiz
            </a>
        </li>
        <li class="@if(Route::is('dashboard')) active  @endif">
            <a class="" href="{{route('dashboard')}}" title="">
                <i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></i> Dashboard
            </a>
        </li>
        <li class="@if(Route::is('all.quizzes')) active  @endif">
            <a class="" href="{{route('all.quizzes')}}" title="">
                <i class="">
                <svg id="ab2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></i>Quizzes
            </a>
        </li>
        <li class="@if(Route::is('library')) active  @endif">
            <a class="" href="{{route('library')}}" title="">
                <i class="">
                    <svg id="ab5" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></i>My Library
            </a>
        </li>
        <li class="@if(Route::is('analytics')) active  @endif">
            <a class="" href="{{route('analytics')}}" title="">
                <i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></i>Quiz Analytics
            </a>
        </li>
        <li class="@if(Route::is('teams')) active  @endif">
            <a class="" href="{{route('teams')}}" title="">
                <i><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></i>
                My Teams
            </a>
        </li>
        <li class="@if(Route::is('evaluations')) active  @endif">
            <a class="" href="{{route('evaluations')}}" title="">
                <i class="">
                <svg id="ab3" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></i>Evaluations
            </a>
        </li>
        <li class="@if(Route::is('bookmarks')) active  @endif">
            <a class="" href="{{route('bookmarks')}}" title="">
                <i class="">
                    <svg id="ab8" class="feather feather-file" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg></i>Bookmarks
            </a>
        </li>
        <li class="@if(Route::is('all.questions')) active  @endif">
            <a class="" href="{{route('all.questions')}}" title="">
                <i class="">
                    <svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></i>Question Bank
            </a>
        </li>
        <li class="@if(Route::is('plans')) active  @endif">
            <a class="" href="{{route('plans')}}" title="">
                <i class="">
                <svg id="team" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg></i>Upgrade
            </a>
        </li>
        <li class="">
            <a class="" href="{{ route('logout') }}" title="" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="">
                <svg id="ab9" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>
        <div class="pt-5">
            <p class="text-center p-2" style="font-size:13px;opacity: 0.5;">Quizzy version 1.0 <br> &copy; <?php echo date("Y"); ?></p>
        </div>
    </ul>
</nav><!-- sidebar -->