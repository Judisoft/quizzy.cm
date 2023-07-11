@include('layouts.dashboard.main')
<style>
    #progress{
    width : 500px;
    padding:5px;
    text-align: right;
    }
    .prog{
        width : 10px;
        height : 10px;
        border: 1px solid #000;
        display: inline-block;
        border-radius: 50%;
        margin-left : 5px;
        margin-right : 5px;
    }
    #timer{
    position: relative;
    text-align: center;
    padding: 1rem;
    }
    #counter{
        font-size: 1.5em;
    }
    #btimeGauge{
        width : 300px;
        height : 10px;
        border-radius: 10px;
        background-color: lightgray;
        margin-left : 25px;
    }
    #timeGauge{
        height : 10px;
        border-radius: 10px;
        background-color: mediumseagreen;
        margin-top : -10px;
        margin-left : 25px;
    }
    .icon-bg {
        height:100px;
        width: 100px;
        border-radius: 8px;
        padding: 10px;
        background-color: #cfe3eb;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="row merged20 mb-4">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="p-3 rounded" style="background-color: #bce0ef;border:1px solid #4267B2; ">
                            <div class="d-flex justify-content-between">
                                <div class="p-1">
                                    <h2 class="main-title text-capitalize fw-700">{{ $quiz->title }}</h2>
                                    <p class="text-dark">
                                        {{ $total_quiz_takers }} {{ Str::plural('user', $total_quiz_takers) }} {{ $total_quiz_takers > 0 ? 'have'  : 'has' }} taken this quiz. 
                                        <a href="#scoreboard-modal" class="text-primary underline fw-500" uk-toggle>view scoreboard</a>
                                    </p>
                                </div>
                                <div class="p-1">
                                    <img class="uk-border-circle float-right" width="200" height="200"  src="{{ asset('images/resources/user_engagement.png')}}">
                                </div>
                            </div>
                            <h4 class="fw-700 text-dark text-right">Quiz High Score: {{ $quiz_high_score ? $quiz_high_score : 0 }} {{ Str::plural('point', $quiz_high_score) }}</h4>
                        </div>
                        <div class="mt-3">
                            <table class="table table-borderless">
                                <thead class="text-center">
                                    <th class="icon-bg">
                                        <img class="uk-border-circle text-center pb-3" width="45" height="45" src="{{ asset('images/resources/q1.gif')}}"><br>
                                        @if($quiz_time < 60){{ $quiz_time }} {{ Str::plural('second', $quiz_time) }} 
                                        @else {{ ceil($quiz_time / 60) }} {{ Str::plural('minute', ceil($quiz_time / 60)) }} 
                                        @endif
                                    </th>
                                    <th></th>
                                    <th class="icon-bg">
                                        <img class="uk-border-circle text-center" width="50" height="50" src="{{ asset('images/resources/q2.gif')}}"><br>
                                        {{ $quiz_points }} {{ Str::plural('point', $quiz_points) }}
                                    </th>
                                    <th></th>
                                    <th class="icon-bg">
                                        <img class="uk-border-circle text-center" width="50" height="50" src="{{ asset('images/resources/q3.gif')}}"><br>
                                        {{ $quiz->questions->count() }} {{ Str::plural('question',$quiz->questions->count()) }}
                                    </th>
                                </thead>
                            </table>
                        </div>
                        <div class="uk-flex uk-flex-between" id="timer">
                            <h5 class="text-danger" id="counter"></h5>
                            <div id="questionProgress"></div>
                        </div>
                        @if($questions->count() > 0)
                            <div class="bg-transparent mt-3" style="border:2px solid #eee;">
                                <p class="text-center fw-500 py-2 px-4" id="instruction">
                                    @if($questions->count() > 0)
                                        <div class="d-wiget-title border-bottom mb-2">
                                            <h2 class="text-center fw-700 py-2">Instructions</h2>
                                        </div>
                                        <ul>
                                            <li>This quiz contains {{ $questions->count() }}  questions. </li>
                                            <li>
                                                You are expected to complete the entire quiz in 
                                                @if($quiz_time < 60){{ $quiz_time }} {{ Str::plural('second', $quiz_time) }} 
                                                @else {{ ceil($quiz_time / 60) }} {{ Str::plural('minute', ceil($quiz_time / 60)) }} 
                                                @endif
                                            </li>
                                            <li>
                                                The quiz will automatically end after
                                                @if($quiz_time < 60){{ $quiz_time }} {{ Str::plural('second', $quiz_time) }} 
                                                @else {{ ceil($quiz_time / 60) }} {{ Str::plural('minute', ceil($quiz_time / 60)) }} 
                                                @endif
                                            </li>
                                            <li>Don't refresh this page while quiz is ongoing. If you do so, you will score a zero for all unanswered questions.</li>
                                        </ul>
                                    @else
                                        No question available for {{ $quiz->title }}
                                    @endif
                                </p>
                                <div class="uk-flex uk-flex-center">
                                    <button id="start" class="button btn-lg danger px-5">
                                        Start Quiz
                                    </button>
                                </div>
                                <div class="d-widget-content">
                                    <div class="tabs tab-content">
                                        <div id="scoreContainer" class="mx-2"></div>
                                        <div id="questReport" class="mx-2"></div>
                                        <div id="reviewTopics" class="mx-2"></div>
                                        <div id="quiz" style="display:none">
                                            {{-- <div id="counter"></div> --}}
                                            <div id="content_1" class="tabcontent px-5">
                                                <div class="d-widget-title"><h4 id="question"></h4></div>
                                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                    <div class="uk-grid-small uk-text-center" uk-grid>
                                                        <div onclick="checkAnswer('A')" class="option"></div>
                                                        <label for="A" id="A" class="uk-flex-right py-1"></label>
                                                    </div>
                                                </div>
                                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                    <div class="uk-grid-small uk-text-center" uk-grid>
                                                        <div onclick="checkAnswer('B')" class="option"></div>
                                                        <label for="B" id="B" class="uk-flex-right py-1"></label>
                                                    </div>
                                                </div>
                                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                    <div class="uk-grid-small uk-text-center" uk-grid>
                                                        <div onclick="checkAnswer('C')" class="option"></div>
                                                        <label for="C" id="C" class="uk-flex-right py-1"></label>
                                                    </div>
                                                </div>
                                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                    <div class="uk-grid-small uk-text-center" uk-grid>
                                                        <div onclick="checkAnswer('D')" class="option"></div>
                                                        <label for="D" id="D" class="uk-flex-right py-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="opacity-3 text-center h5">This quiz has no questions</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- main content -->
    <!-- Scoreboard modal -->
    <div id="scoreboard-modal" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h2 class="uk-modal-title text-center fw-700">Score Board</h2>
            <div class="mt-2">
                <table class="table table-striped table-hover">
                    @if($quiz_high_score)
                        <thead>
                            <th>Rank</th>
                            <th>User</th>
                            <th>Score</th>
                            <th>Contact Info</th>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($ranks as $key=>$rank)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $rank->user->name }}</td>
                                <td>{{ $rank->score }}</td>
                                <td><a href="{{ route('user.profile', $rank->user->id) }}" class="button small primary">view</a></td>
                            </tr>
                        @empty
                        <tr><p class="text-center border rounded p-3">No user has taken this quiz</p></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <p class="uk-text-right">
                {{ $ranks->links('pagination::bootstrap-4') }}
            </p>        
        </div>
    </div>
    <!-- Share modal -->
    <div id="modal-center" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="container mt-4">
                <h2 class="text-center fw-700 py-3">Share Quiz</h2>
                <img src="{{ asset('images/resources/share.svg') }}">
                <h3 class="my-3 text-primary">Share with</h3>
                <form action="{{ route('share.quiz', $quiz) }}" method="POST">
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
                        <div class="py-3"><button type="submit" class="button primary"><i class="icofont-share"></i> share</button></div>
                    </div>
                </form>
                <h3 class="uk-heading-line uk-text-center"><span>Share via</span></h3>
                <div class="mt-3 text-center">{!! $share_btn !!}</div>
            </div>        
        </div>
    </div>
<script>

// select all elements
const start = document.getElementById("start");
const quiz = document.getElementById("quiz");
const question = document.getElementById("question");
const qImg = document.getElementById("qImg");
const choiceA = document.getElementById("A");
const choiceB = document.getElementById("B");
const choiceC = document.getElementById("C");
const choiceD = document.getElementById("D");
// const nextQuestion = document.getElementById("nextQuestion");
// const previousQuestion = document.getElementById("previousQuestion");
const counter = document.getElementById("counter");
// const timeGauge = document.getElementById("timeGauge");
// const progress = document.getElementById("progress");
const scoreDiv = document.getElementById("scoreContainer");
const reviewTopics = document.getElementById("reviewTopics");
const questReport = document.getElementById("questReport");
const intruction = document.getElementById("instruction");
let topic = document.getElementById("topic")
let topicName = document.getElementById("topicName")
let questionProgress = document.getElementById("questionProgress")
const timer = document.getElementById("timer")
const high_score = {!! json_encode($quiz_high_score) !!}
let isAnswerCorrect
let reviewTopicsArray = []
let questions_report = []

// convert questions to json format

let questions = {!! json_encode($questions) !!};


// create variables

const lastQuestion = questions.length - 1;
let runningQuestion = 0;
let count = 0;
let questionTime = questions[runningQuestion].duration;
const gaugeWidth = 150; // 150px
const gaugeUnit = gaugeWidth / questionTime;
let TIMER;
let score = 0;
let correctAnswers = 0

// render a question
function renderQuestion(){
    
    if (runningQuestion < lastQuestion) {
            window.onbeforeunload = function () {
                return false;
            // clearInterval(TIMER);
            // saveScore()
            
        }
    }
    
    let q = questions[runningQuestion];
    
    question.innerHTML = "<small class='bg-warning p-1'>Question</small>" + "<small class='bg-warning p-1'>" +(runningQuestion + 1) + "</small>" + "<br /><br/ /> " + q.content;
    choiceA.innerHTML = q.A;
    choiceB.innerHTML = q.B;
    choiceC.innerHTML = q.C;
    choiceD.innerHTML = q.D;

    questionProgress.innerHTML = `<h5 class="uk-text-lead text-light p-3 rounded" style="font-weight:700">${runningQuestion + 1} / ${questions.length}</h5>`

}


start.addEventListener("click",startQuiz);

// start quiz
function startQuiz(){
    instruction.style.display = "none"
    start.style.display = "none";
    renderQuestion();
    quiz.style.display = "block";
    // renderProgress();
    renderCounter();
    TIMER = setInterval(renderCounter,1000); // 1000ms = 1s
}

// function getNextQuestion() {
//     if(runningQuestion < lastQuestion){
//         runningQuestion++;
//         renderQuestion();
//     } else {
//         nextQuestion.style.display = "none";
//         quiz.style.display = "none";
//         scoreRender();

//     }
// }

// function getPreviousQuestion() {
//     if(runningQuestion > 0){
//         runningQuestion--;
//         renderQuestion();
//     }
// }

// render progress
// function renderProgress(){
//     for(let qIndex = 0; qIndex <= lastQuestion; qIndex++){
//         progress.innerHTML += "<div class='prog' id="+ qIndex +"></div>";
//     }
// }


// counter render

function renderCounter(){
    if(count <= questionTime){
        timer.style.backgroundColor = "#4267B2"
        counter.innerHTML = `<h5 class="uk-text-lead text-light p-3 rounded" style="font-weight:700">${count} seconds</h5>`;
        // timeGauge.style.width = count * gaugeUnit + "px";
        count++
    }else{
        count = 0;
        isAnswerCorrect = 0
        correctAnswers = 0
        performanceAnalysis("{{ auth()->user()->id }}", "{{ $quiz->id }}", questions[runningQuestion].id, isAnswerCorrect)
        
        if(runningQuestion < lastQuestion){
            runningQuestion++;
            questionTime = questions[runningQuestion].duration;
            renderQuestion();
        }else{
            // nextQuestion.innerHTML = 'submit';
            // end the quiz and show the score
            clearInterval(TIMER);
            scoreRender();
            counter.innerHTML = `<h5 class="text-danger"><i class="icofont-clock-time"></i> </h5>`

        }
    }
    
}


// checkAnwer

function checkAnswer(userAnswer)
{

    if( userAnswer == questions[runningQuestion].answer)
    {

        // answer is correct
        isAnswerCorrect = 1;
        correctAnswers++;
        performanceAnalysis("{{ auth()->user()->id }}", "{{ $quiz->id }}", questions[runningQuestion].id, isAnswerCorrect)
        score += questions[runningQuestion].points;

        if(runningQuestion < lastQuestion)
        {
            runningQuestion++;
            renderQuestion();
        }else{
            // end the quiz and show the score
            
            clearInterval(TIMER);
            scoreRender();
        }
    
    }else{
    
        count = 0;
            isAnswerCorrect = 0;
        performanceAnalysis("{{ auth()->user()->id }}", "{{ $quiz->id }}", questions[runningQuestion].id, isAnswerCorrect)

        if(runningQuestion < lastQuestion){
            runningQuestion++;
            renderQuestion();
        }else{
            // end the quiz and show the score
            clearInterval(TIMER);
            scoreRender();
        }
    }

}


// score render
function scoreRender(){
    scoreDiv.style.display = "block";
    quiz.style.display = "none";
    instruction.style.display = "none";
    
    // calculate the amount of question percent answered by the user
    const scorePerCent = Math.round(100 * score/{{ $quiz_points }});
    
    // choose the image based on the scorePerCent
    // let img = (scorePerCent >= 80) ? "/img/5.png" :
    //         (scorePerCent >= 60) ? "/img/4.png" :
    //         (scorePerCent >= 40) ? "/img/3.png" :
    //         (scorePerCent >= 20) ? "/img/2.png" :
    //         "/img/1.png";
    
    // scoreDiv.innerHTML = "<img style='text-align:center' src="+ img +">";
    
    scoreDiv.innerHTML = `<div class="d-widget p-2 mt-4 text-center">
                            <a class="text-primary text-right"  href="#modal-center" uk-toggle><i class="icofont-share px-2"></i> Share this quiz </a>
                            <table class="table table-borderless">
                                <thead>
                                    <h4 class='text-secondary py-3'>SCORE BOARD</h4>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><h3 style='font-weight:900'>${scorePerCent} % </h3></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><p class='fw-700 text-secondary'>High Score</p> <h4 class='fw-700 text-secondary'>${high_score ? high_score : 0}</h4></td>
                                        <td><p class='fw-700 text-secondary'>Points</p> <h4 class='fw-700 text-secondary'>${score}/{{ $quiz_points }}</h4></td>
                                        <td><p class='fw-700 text-secondary'>Questions</p><h4 class='fw-700 text-secondary'>${correctAnswers}/${lastQuestion + 1}</h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>`
    counter.innerHTML = `<h4 class="uk-text-lead uk-text-center fw-700 text-danger p-3 rounded" style="font-weight:700">Quiz Ended</h4>`

    saveScore()

    // Render Question Report

    questReport.innerHTML = '<h4 class="fw-700 p-3">Performance Feedback</h4>'

    questions_report.map(item => {
        item.forEach(questItem => {
            questReport.innerHTML += `<div class="${questItem.answer_correct === 1 ? 'alert alert-success' : 'alert alert-danger'}">
                                        ${questItem.answer_correct === 1 ? '<i class="icofont-verification-check float-right"></i>' : '<i class="icofont-close float-right"></i>'}
                                            ${questItem.question.content}
                                        Points: ${questItem.answer_correct === 1 ? questItem.question.points : 0}
                                    </div>`
        })
    })
    
    // Render topics to review
    reviewTopics.innerHTML = '<h4 class="fw-700 p-3">Topics to review</h4>'
    if(score === {{ $quiz_points }}) {
        reviewTopics.innerHTML = `<div class='alert alert-info'><p class='fw-500 text-capitalize'>Great Job! You are doing well!</p></div>`
    } else {
        reviewTopicsArray.map(item => {
            item.forEach(review_topic => {
                reviewTopics.innerHTML += `<div class='alert alert-info'>
                                                ${review_topic.question.topic.topic}
                                            </div>`
            })
        })
    }

}

function saveScore() 
{
    let score_data = {
        user_id: "{{ auth()->user()->id }}",
        quiz_id: "{{ $quiz->id }}",
        user_score: score,
        max_quiz_score: "{{ $quiz_points }}"
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url: '/quizzes/post-score',
        method: 'post',
        data: score_data,
        success: function(){
            
        }});

}

function performanceAnalysis(userId,quizId,questionId,correctAnswer)
{
    axios.post('/analytics/question/post', {
    user_id: userId,
    quiz_id: quizId,
    question_id: questionId,
    correct_answer: correctAnswer
    })
    .then(function (response) {
        const topicsToRevise = response.data.topics_to_revise;
        const quests = response.data.questions_report;

        reviewTopicsArray.push(topicsToRevise);
        questions_report.push(quests);
    })
    .catch(function (error) {
        console.log(error);
    });
}

</script>
