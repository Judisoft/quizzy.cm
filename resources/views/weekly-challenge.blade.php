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
                                    <h2 class="main-title text-capitalize fw-700">Quizzy Weekly Challenge</h2>
                                    <h4 class="text-dark"> 
                                        Week {{ $current_week_id}}
                                    </h4>
                                </div>
                                <div class="p-1">
                                    <img class="uk-border-circle float-right" width="200" height="200"  src="{{ asset('images/resources/user_engagement.png')}}">
                                </div>
                            </div>
                            <h4 class="fw-700 text-dark text-right">Quiz High Score: @if($high_score) {{  $high_score.'%' }} @else 0% @endif</h4>
                        </div>
                        <div class="mt-3">
                            <table class="table table-borderless">
                                <thead class="text-center">
                                    <th><img class="uk-border-circle text-center" width="45" height="45" src="{{ asset('images/resources/clock.png')}}"></th>
                                    <th><img class="uk-border-circle text-center" width="50" height="50" src="{{ asset('images/resources/points.png')}}"></th>
                                    <th><img class="uk-border-circle text-center" width="50" height="50" src="{{ asset('backend/images/resources/question-mark.png')}}"></th>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>
                                            @if($quiz_time < 60){{ $quiz_time }} {{ Str::plural('second', $quiz_time) }} 
                                            @else {{ ceil($quiz_time / 60) }} {{ Str::plural('minute', $quiz_time / 60) }} 
                                            @endif
                                        </td>
                                        <td>
                                            {{ $quiz_points }} {{ Str::plural('point', $quiz_points) }}
                                        </td>
                                        <td>
                                            {{ $questions->count() }} {{ Str::plural('question',$questions->count()) }}
                                        </td>
                                    </tr>
    
                                </tbody>
                            </table>
                        </div>
                        <div class="uk-flex uk-flex-between" id="timer">
                            <h5 class="text-danger" id="counter"></h5>
                            <div id="questionProgress"></div>
                        </div>
                        <div class="bg-transparent mt-3" style="border:2px solid #eee;">
                            <p class="text-center fw-500 py-2 px-4" id="instruction">
                            <div class="d-wiget-title">
                                <h2 class="text-center fw-700 pb-2">Instructions</h2>
                            </div>
                            <ul>
                                <li>This quiz contains {{ $questions->count() }}  questions. </li>
                                <li>
                                    You are expected to complete the entire quiz in 
                                    @if($quiz_time < 60){{ $quiz_time }} {{ Str::plural('second', $quiz_time) }} 
                                    @else {{ ceil($quiz_time / 60) }} {{ Str::plural('minute', $quiz_time / 60) }} 
                                    @endif
                                </li>
                                <li>
                                    The quiz will automatically end after
                                    @if($quiz_time < 60){{ $quiz_time }} {{ Str::plural('second', $quiz_time) }} 
                                    @else {{ ceil($quiz_time / 60) }} {{ Str::plural('minute', $quiz_time / 60) }} 
                                    @endif
                                </li>
                                <li>Don't refresh this page while quiz is ongoing. If you do so, you will score a zero for all unanswered questions.</li>
                            </ul>
                            </p>
                            <div class="uk-flex uk-flex-center">
                                <button id="start" class="button btn-lg danger px-5">
                                    Start Challenge
                                </button>
                            </div>
                            <div class="d-widget-content">
                                <div class="tabs tab-content">
                                    <div id="scoreContainer"></div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
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
    const intruction = document.getElementById("instruction");
    let topic = document.getElementById("topic")
    let topicName = document.getElementById("topicName")
    let questionProgress = document.getElementById("questionProgress")
    const timer = document.getElementById("timer")
    const high_score = {!! json_encode($high_score) !!}
    let isAnswerCorrect
    
    // convert questions to json format

    let questions = {!! json_encode($questions) !!};
    console.log(questions)

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
            timer.style.backgroundColor = "#202A44"
            counter.innerHTML = `<h5 class="uk-text-lead text-light p-3 rounded" style="font-weight:700">${count} seconds</h5>`;
            // timeGauge.style.width = count * gaugeUnit + "px";
            count++
        }else{
            count = 0;
            isAnswerCorrect = 0
            correctAnswers = 0
          
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
                                <table class="table table-borderless">
                                    <thead>
                                        <th><h4 style='color:#ccc'>SCORE BOARD</h4></th>
                                        <th></th>
                                        <th><a class="text-primary" href="{{ route('leaders.board') }}">leadersboard</a></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td><h4 class='fw-700 rounded p-3' style='background-color:#bce0ef; border:none;'>${scorePerCent} %</h4></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><img class="uk-border-circle text-center" width="50" height="50" src="{{ asset('images/resources/reward.png')}}"><h6 class='fw-700 text-secondary'>HIGH SCORE <br> ${high_score != null ? high_score : 0}</h6></td>
                                            <td><img class="uk-border-circle text-center" width="50" height="50" src="{{ asset('images/resources/points.png')}}"><h6 class='fw-700 text-secondary'>POINTS <br>${score}/{{ $quiz_points }}</h6></td>
                                            <td><img class="uk-border-circle text-center" width="50" height="50" src="{{ asset('backend/images/resources/question-mark.png')}}"> <h6 class='fw-700 text-secondary'>QUESTIONS <br> ${correctAnswers}/${lastQuestion + 1}</h6></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>`
        counter.innerHTML = `<h4 class="uk-text-lead uk-text-center fw-700 text-danger p-3 rounded" style="font-weight:700">Quiz Ended</h4>`

        saveScore()
    }

    function saveScore() 
    {
        const u_score = Math.round(100 * score/questions.length)
        let current_week_id = {{ $current_week_id }};
        let user_data = {
            user_id: "{{ auth()->user()->id }}",
            week_id: current_week_id,
            user_score: u_score
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: '/weekly-challenge/post',
            method: 'post',
            data: user_data,
            success: function(){
                
            }});

    }


</script>
