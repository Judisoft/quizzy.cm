@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h2 class="main-title fw-700">Quiz Evaluations</h2>
                <div class="row merged20 mb-4">
                    <div class="col-lg-8">   
                        <div class="d-widget mb-4">
                            <div class="d-widget-title">
                                <h5 class="text-capitalize">Score Sheet</h5>
                                <a href="{{ route('evaluation.create') }}"><button class="button primary float-right">set an evaluation</button></a>
                            </div>
                            <table class="table-default table table-striped table-responsive-md">
                                <thead>
                                <tr>
                                    <th class="wd-35p">Examiner</th>
                                    <th class="wd-35p">Quiz Title</th>
                                    <th class="wd-25p">Subject</th>
                                    <th class="wd-15p">Score (%)</th>
                                    <th class="wd-25p">Date</th>
                                    <th class="wd-25p">Status</th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluations as $evaluation)
                                    @if($evaluation->quiz->attempts_permitted == 1)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xs"><img src="{{ $evaluation->quiz->user->profile_photo_url }}" alt="{{ $evaluation->quiz->user->name}}"></div>
                                            <span class="tx-medium mg-l-10">{{ $evaluation->quiz->user->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $evaluation->quiz->title }}</td>
                                        <td>
                                            {{ $evaluation->quiz->subject->title }}
                                        </td>
                                        <td>{{ round(($evaluation->score * 100) / $evaluation->max_quiz_score, 1) }}</td>
                                        <td>
                                            {{ $evaluation->created_at }}
                                        </td>
                                        <td><button class="button small success">completed</button></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($evaluation->quiz->attempts_permitted == 0)
                                        <p class="text-center">You have not taken any evaluation yet</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="d-widget mb-4">
                            <div class="d-widget-title">
                                <h5>My Scores</h5>
                            </div>
                            <div class="d-widget-content">
                                <ul class="earningz">
                                    @foreach ($evaluations as $score)
                                        @if($score->quiz->attempts_permitted == 1)
                                            <li class="uk-text-capitalize d-widget-title"><span class="text-dark">{{ $score->quiz->title }} </span>
                                                @if($score->score >= ($score->max_quiz_score / 2))
                                                    <small style="background-color:#D7F0E5;color:#36B37E;border-radius:50%;"><i class="icofont-verification-check"></i></small> 
                                                @else
                                                    <small style="background-color:#ffddd6;color:#ff5630;border-radius:50%;"> <i class="icofont-close text-danger"></i></small>
                                                @endif
                                                <em>
                                                    {{sprintf("%.1f", ($score->score / $score->max_quiz_score) * 100, 1 )}} %
                                                </em>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <svg id="ab3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star earning"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->