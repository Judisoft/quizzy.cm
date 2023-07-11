@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h1 class="main-title fw-700">Welcome {{auth()->user()->name}}! <img src="{{ asset('images/resources/hands.png') }}" class="img-sm"></h1>
                <h4 class="main-title fw-500">What is your main focus for today?</h4>
                <div class="row merged20 mb-4">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="d-widget" style="background-color:#EEEEF5">
                            <div class="d-flex justify-content-between">
                               <div class="p-1"> <img src="{{ asset('images/resources/grades.png') }}" style="width:75px;height:75px;"></div>
                               <div class="py-3">
                                    <h4><a href="#modal-center" class="text-primary fw-700 float-right" uk-toggle>Take a Quiz</a></h4>
                               </div>
                            </div>
                            <div id="modal-center" class="uk-flex-top" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <div class="uk-flex uk-flex-column mr-auto">
                                        <h3 class="main-title fw-700">Choose a quiz mode</h3>
                                        <p class="text-dark">There are two ways in which you can take quizzes - <em>Revision/Practice Mode</em> and the <em>Timed Mode</em>
                                            In the Revision mode, you answer questions on-the-go and Quizzy autochecks as you proceed. <br>
                                            However, in the timed-quiz mode, a quiz is automatically generated and you're expected too complete the entire quiz in a single session.
                                            At the end of the quiz, you will be shown your score.
                                        </p>
                                        <div class="p-2"><a href="{{route('subjects')}}"><button href="" class="button soft-primary btn-block"><img src="{{ asset('images/resources/revision.png') }}" class="img-sm"> Revision mode</button></a></div>
                                        <div class="p-2"><a href="{{route('all.quizzes')}}"><button class="button soft-primary btn-block"><img src="{{ asset('images/resources/time.png') }}" class="img-sm"> Timed-quiz mode</button></a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="d-widget" style="background-color:#EEEEF5">
                            <div class="d-flex justify-content-between">
                                <div class="p-1"> <img src="{{ asset('images/resources/quest.png') }}" style="width:75px;height:75px;"></div>
                                <div class="py-3">
                                     <h4><a href="{{route('subjects')}}" class="text-primary fw-700 float-right">Browse Questions</a></h4>
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="d-widget" style="background-color:#EEEEF5">
                            <div class="d-flex justify-content-between">
                                <div class="p-1"> <img src="{{ asset('images/resources/podium.png') }}" style="width:75px;height:75px;"></div>
                                <div class="py-3">
                                     <h4><a href="{{route('weekly.challenge')}}" class="text-primary fw-700 float-right">Compete</a></h4>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row merged20 mt-4">
                        <div class="col-lg-6">
                            <div class="d-widget mb-4">
                                <div class="d-widget-title">
                                    <h5>Your Quiz Performance</h5>
                                </div>
                                <div class="d-widget-content">
                                    <div id="chart_div" style="width: 100%;height: 300px;overflow-x:none;"></div>
                                </div>
                            </div>
                            <div class="d-widget">
                                <div class="d-widget-title">
                                    <h5>Performance Progression</h5>
                                </div>
                                <div class="d-widget-content">
                                    <div id="progress_chart" style="width: 100%;height: 300px;overflow-x:none;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-widget">
                                <div class="d-widget-title">
                                    <h5>Notifications</h5>
                                </div>
                                <div class="d-Notices"> 
                                    <ul>
                                        @forelse ($invitations as $invitation)
                                            <li>
                                                <p>{{ $invitation->created_at->format('l jS \o\f F Y ') }}</p>
                                                <h6><a href="#" title="">{{ $invitation->team->owner->name }}</a> is inviting you to join {{$invitation->team->name}}</h6>
                                                <div class="action-btns">
                                                    <a class="button soft-danger" >decline</a>
                                                    <a class="button soft-primary" href="#">accept</a>
                                                </div>
                                            </li>
                                        @empty
                                            <p class="text-center">Enjoy the silence</p>
                                        @endforelse
                                            
                                    </ul>
                                </div>
                            </div>
                            <div class="d-widget mt-4">
                                <div class="d-widget-title">
                                    <h5>Scheduled Evaluations</h5>
                                </div>
                                <ul class="upcoming-event">
                                    @forelse ($scheduled_quizzes as $quiz)
                                    <li>
                                        <div class="event-date soft-blue">
                                            <i>{{ $quiz->created_at->format('d') }} {{ $quiz->created_at->format('M') }}</i>
                                            <span>{{ $quiz->created_at->format('Y') }}</span>
                                        </div>
                                        <div class="event-deta">
                                            <h5><a href="{{ route('display.quiz', $quiz) }}">{{ $quiz->title }}</a></h5>
                                            <ul>
                                                <li><i class="icofont-user"></i> {{ $quiz->user->name }}</li>
                                                <li><i class="icofont-file-alt"></i> {{ $quiz->questions->count()}}</li>
                                                <li><i class="icofont-clock-time"></i> {{ $quiz->created_at->format('H:i:s:a') }}</li>
                                            </ul>
                                        </div>
                                    </li>
                                    @empty
                                    <p class="text-center">No scheduled quiz</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
<script type="text/javascript">
// Check user's internet connectivity
fetch('https://static-global-s-msn-com.akamaized.net/hp-neu/sc/2b/a5ea21.ico?d='+Date.now())
  .then(response => {
    if (!response.ok)
      throw new Error('Network response was not ok');
  })
  .catch(error => {
    document.getElementById('chart_div').innerHTML = `<div class='text-center py-5 opacity-3'>Chart can't load <br>Refresh Page</div>`
    document.getElementById('progress_chart').innerHTML = `<div class='text-center py-5 opacity-3'>Chart can't load <br>Refresh Page</div>`
  });


let userScore = {!! $result !!} //
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawProgressChart);

    function drawChart() 
    {
        let data = google.visualization.arrayToDataTable(userScore);

        let options = {
                        series: {
                            0: { color: '#008dcd' }
                        },
                        hAxis: {
                            title: 'Score (%)',  
                            titleTextStyle: {
                                    color: '#008dcd'
                                }
                            },
                        vAxis: {
                                title: 'Quizzes', 
                                titleTextStyle: {
                                    color: '#008dcd'
                                },
                                baselineColor: '#008dcd', 
                                minValue: 0, 
                                gridlines: {
                                    color: 'transparent'
                                }
                            }
                    };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

    function drawProgressChart() 
    {
        let data = google.visualization.arrayToDataTable(userScore);

        let options = {
                        series: {
                            0: { color: '#008dcd' }
                        },
                        hAxis: {
                            title: 'Quizzes',  
                            titleTextStyle: {
                                    color: '#008dcd'
                                }
                            },
                        vAxis: {
                                title: 'Score (%)', 
                                titleTextStyle: {
                                    color: '#008dcd'
                                },
                                baselineColor: '#008dcd', 
                                minValue: 0, 
                                gridlines: {
                                    color: 'transparent'
                                }
                            }
                    };

        var chart = new google.visualization.AreaChart(document.getElementById('progress_chart'));
        chart.draw(data, options);
    }
</script>
