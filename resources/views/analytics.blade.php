@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h2 class="main-title fw-700">Quiz Analytics</h2>
                <div class="row merged20 mb-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="w-chart-section">
                            <div class="w-detail">
                                <h5 class="w-title">Questions</h5>
                                <h1 class="w-stats text-dark">{{ $user_questions->count() }}</h1>
                                <span>
                                    <img src="{{ asset('images/resources/quest.png') }}" style="width:75px;height:75px;">
                                    <p class="pt-4"><a class="text-primary" href="{{ route('index.questions') }}">view more <i class="icofont-simple-right"></i></a></p>
                                </span>
                            </div>
                            <div class="w-chart-render-one">
                                <div id="total-users"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="w-chart-section">
                            <div class="w-detail">
                                <h5 class="w-title">Quizzes</h5>
                                <p class="w-stats text-dark">{{ $quizzes->count() }}</p>
                                <span>
                                    <img src="{{ asset('images/resources/grades.png') }}" style="width:75px;height:75px;">
                                    <p class="pt-4"><a class="text-primary" href="{{ route('library') }}">view more <i class="icofont-simple-right"></i></a></p>
                                </span>
                                </div>
                            <div class="w-chart-render-one">
                                <div id="paid-visits"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="w-chart-section">
                            <div class="w-detail">
                                <h5 class="w-title">Likes</h5>
                                <p class="w-stats text-dark">{{ $likes->count() }}</p>
                                <span>
                                    <img src="{{ asset('images/resources/like.png') }}" style="width:75px;height:75px;">
                                    <p class="pt-4"><a class="text-primary" href="{{ route('library') }}">view more <i class="icofont-simple-right"></i></a></p>
                                </span>
                            </div>
                            <div class="w-chart-render-one">
                                <div id="total-downloads"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row merged20 mb-4">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="d-widget">
                            <div class="d-widget-title">
                                <h3 class="main-title fw-700">
                                    Select quiz to view performance
                                </h3>
                            </div>
                            <div class="uk-margin my-3">
                                <select class="uk-select" onchange="getStatistics()" id="quizId">
                                    <option value="">Select Quiz</option>
                                    @foreach ($user_quizzes as $quiz)
                                        <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-widget-content">
                                <div class="tabs tab-content">
                                    <div class="tabcontent">
                                        <div id="content">
                                            <div class="row justify-content-center align-items-center pt-2">
                                                <img src="{{ asset('backend/images/resources/stats4.svg') }}" height="100" width="100">
                                            </div> 
                                            <h5 class="text-center opacity-3 p-3">Select quiz to view performance</h5>
                                        </div>
                                        <div class="uk-overflow-auto">
                                            <table class="uk-table uk-table-striped">
                                                <thead id="tHead">
                                                </thead>
                                                <tbody id="tableData" class="text-center p-3">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="container mt-4">
            <h2 class="text-center fw-700 py-3">Share Quiz</h2>
            <img src="{{ asset('images/resources/share.svg') }}">
            <h3 class="my-3 text-primary">Share with</h3>
            {{-- <form action="{{ route('share.quiz', $quiz) }}" method="POST"> --}}
                @csrf
                <div class="uk-flex flex-column">
                    <h4 class="main-title fw-500 border-bottom pt-2">Teams</h4>
                    @foreach (Auth::user()->allTeams() as $team)
                        <label><input class="uk-checkbox" type="checkbox" name="group_id[]" value="{{ $team->id }}">  {{ $team->name }} <br></label>
                    @endforeach
                    <h5 class="main-title fw-500 border-bottom pt-2">Users</h5>
                    @foreach (Auth::user()->currentTeam->allUsers() as $user)
                    <label><input class="uk-checkbox" type="checkbox" name="receipient_id[]" value="{{ $user->id }}">  {{ $user->name }} <br></label>
                    @endforeach
                    <div class="py-3">
                        <button type="submit" class="button primary"><i class="icofont-share"></i> share</button>
                    </div>
                </div>
            </form>
            <h3 class="uk-heading-line uk-text-center"><span>Share via</span></h3>
            <div class="mt-3 text-center">{!! $share_btn !!}</div>
        </div>        
    </div>
</div>

<script>
    let quizId = document.getElementById("quizId")
    let tableData = document.getElementById("tableData")
    const content = document.getElementById("content")

function formatDate(date)
{
    dayjs.extend(window.dayjs_plugin_relativeTime);
    return dayjs(date).fromNow()
}

function getStatistics(){
    content.style.display = "none"
    axios.post('/analytics/post', {
    quiz_id: quizId.value
  })
  .then(function (response) {
    // let res = JSON.stringify(response.data)
    let res = response.data
    
    displayStats(res)
     
  })
  .catch(function (error) {
    console.log(error);
  });
}

function displayStats(data)
    {
        const tHead = document.getElementById("tHead")
        let tableData = document.getElementById("tableData")
        
        content.innerHTML = `<p>Graph here</p>`
        tHead.innerHTML = `<tr>
                                <th>Username</th>
                                <th>Email address</th>
                                <th>Grade/100</th>
                                <th>Attempts</th>
                                <th>Date completed</th>
                            </tr>`

        tableData.innerHTML = ""
        if(data.length === 0 )
        {
            tHead.innerHTML = `<div class="text-center">
                                    <h5 class="p-2">This quiz has not been taken</h5>
                                    <a href="#modal-center" uk-toggle><button class="button">Share Quiz</button></a>
                                </div>`
        }else
        {
            data.forEach(element => {
            
                tableData.innerHTML += `<tr class="text-left">
                                            <td><a href="/analytics/user-performance/${element.user.id}/${element.quiz_id}" class="text-primary">${element.user.name}</a></td>
                                            <td>${element.user.email}</td>
                                            <td>${((element.score / element.max_quiz_score) * 100).toFixed(1)}</td>
                                            <td>${element.attempts}</td>
                                            <td>${formatDate(element.created_at)}</td>
                                        </tr>`
            });

        }        
        
    }


</script>