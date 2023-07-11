@include('layouts.dashboard.main')
<style>
    .search:hover {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="row merged20" id="searchResults">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <h2 class="main-title text-center fw-700 py-3">Which quiz do you want to take today?</h2>
                        <form action="{{ route('all.quizzes') }}" method="get">
                            <div class="uk-flex flex-row border rounded search">
                                <button type="submit" class="button rounded-0" style="background-color:#fff;border:none;"><i class="icofont-search-1 text-dark"></i></button>
                                <input class="uk-input rounded p-3" type="search" placeholder="Search from Quizzy library" name="search" style="border:none;font-size:20px;">
                            </div>
                        </form>
                        @forelse($quizzes as $quiz)
                            @if($quiz->questions->count() > 0)
                                <div class="my-2 mt-4">
                                    <div class="d-widget bg-transparent">
                                        <div class="d-widget-title">
                                            <div class="uk-flex uk-flex-row">
                                                <div><small class="bg-warning p-1 ">MCQ</small></div>
                                                <div class="px-3"><a class="button small light" href="{{ route('download.pdf', $quiz)}}">{{ $quiz->subject->title }}</a></div>
                                            </div>
                                        </div>
                                        
                                        <div class="uk-flex justify-content-end">
                                            <div class="d-widget-title py-3">
                                                <p class="text-capitalize pt-3" style="font-size:24px;font-weight:600;">
                                                    <img src="{{ asset('images/resources/quiz3.png') }}" class="img-sm border">
                                                    <a href="{{ route('display.quiz', $quiz) }}">{{$quiz->title}}
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="pt-3">
                                                <div class="d-flex flex-column">
                                                    <h5 class="fw-700 bg-light text-center my-4"><img src="{{ asset('images/resources/m8.png') }}" class="menu-img" alt=""><br> {{ $quiz->questions->count()}}</h5>
                                                    <h5 class="fw-700 bg-light text-center mb-2" id="{{ $quiz->id }}"><img src="{{ asset('images/resources/tu.png') }}" class="menu-img" alt=""> {{ $quiz->number_of_likes }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-widget-content">
                                            <div class="uk-flex justify-content-between">
                                                <div>
                                                    <a href="{{ route('user.profile', $quiz->user->id) }}" class="button small light">
                                                        <i class="icofont-user"></i> {{ $quiz->user->name }} |
                                                        {{ $quiz->created_at->diffForHumans() }}
                                                    </a>
                                                </div>
                                                <div>
                                                    @if($quiz->hasAuthUserBookmarkedQuiz())
                                                        <button class="button small" disabled><img src="{{ asset('images/resources/bookmark.png') }}" class="menu-img" alt=""></button>
                                                    @else
                                                        <a class="button small light"  onclick="bookMark({{ $quiz->id }})" id="bookmark"><img src="{{ asset('images/resources/bookmark.png') }}" class="menu-img" alt=""></a>
                                                    @endif
                                                    @if($quiz->hasAuthUserLikedQuiz())
                                                        <button class="button small light" onclick="unlike({{ $quiz->id}}, {{ $quiz->number_of_likes}})" id="unlikeBtn"><img src="{{ asset('images/resources/td.png') }}" class="menu-img" alt=""></button>
                                                    @else
                                                        <button class="button small light" onclick="likeQuiz({{ $quiz->id }}, {{ $quiz->number_of_likes}})" id="likeBtn"><img src="{{ asset('images/resources/tu.png') }}" class="menu-img" alt=""></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="col-lg-8 text-center mt-5">
                                <img src="{{ asset('images/resources/empty-folder2.png') }}" class="img-sm">
                                <h5 class="opacity-3 p-3">No Quiz</h5>
                                <a href="{{ route('quiz.create') }}" class="mr-auto text-center"><button class="button dark small">create quiz</button></a>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <div class="mt-4">
                            <h5 class="main-title fw-700">Explore quizzes in</h5>
                            @foreach ($subjects as $subject)
                                <div class="d-widget-title">
                                    <a class="text-primary h6" href="{{ route('questions', $subject->id) }}">
                                        <i class="icofont-arrow-right px-2 pt-2"></i>
                                        {{$subject->title}}
                                    </a>
                                </div>
                            @endforeach
                       </div>
                    </div>
                </div>
                <div class="text-right p-3">{{ $quizzes->links('pagination::bootstrap-4') }}</div> 
            </div>
        </div>
    </div>
</div><!-- main content -->
    
<script>
    const bookmark = document.getElementById("bookmark")
    const likeBtn = document.getElementById("likeBtn")
    const unlikeBtn = document.getElementById("unlikeBtn")

    function notification(type, outputMessage)
    {
        UIkit.notification({
            message: outputMessage,
            status: type,
            pos: 'bottom-right',
            timeout: 5000
        });
    }

    function bookMark(id)
    {
        axios.post('/all-quizzes/add-bookmark', {
        quiz_id: id,
        user_id: "{{ auth()->user()->id }}"
        })
        .then(function (response) {
            // console.log(response)
            notification('success', response.data.success)
            bookmark.classList.remove("light")
            bookmark.innerHTML = `<button class="button small" disabled><img src="{{ asset('images/resources/bookmark.png') }}" class="menu-img" alt=""></button>`
            
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function likeQuiz(id, numLikes)
    {
        let like = document.getElementById(id)

        axios.post('/all-quizzes/like', {
        quiz_id: id,
        user_id: "{{ auth()->user()->id }}"
        })
        .then(function (response) {
            like.innerHTML = `<img src="{{ asset('images/resources/tu.png') }}" class="menu-img" alt=""> ${numLikes + 1}`
            document.getElementById("likeBtn").style.display = 'none'
            document.getElementById("unlikeBtn").style.display = 'block'
            notification('success', response.data.success)
            
        })
        .catch( function (error) {
            console.log(error)
        })

    }

    function unlike(id, numLikes)
    {
        let like = document.getElementById(id)
        axios.post('/all-quizzes/unlike', {
        quiz_id: id,
        user_id: "{{ auth()->user()->id }}"
        })
        .then(function (response) {
            if(numLikes > 0) {
                like.innerHTML = `<img src="{{ asset('images/resources/tu.png') }}" class="menu-img" alt=""> ${numLikes - 1}`
            }
            document.getElementById("unlikeBtn").style.display = 'none'
            document.getElementById("likeBtn").style.display = 'block'
            notification('success', response.data.success)
        })
        .catch( function (error) {
            console.log(error)
        })
    }
</script>