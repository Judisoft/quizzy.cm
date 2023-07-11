@include('layouts.dashboard.main')
<div class="row">
    <div class="col-lg-12">
        <div class="panel-content">
            <div>
                <div class="d-widget-content">
                    <div class="p-3">
                        <h1 class="main-title text-capitalize">{{ $quiz->title }}</h1>
                    </div>
                    @foreach($questions as $key => $question)
                        <div class="ml-3">
                            <div class="uk-card uk-card-default uk-card-shadow">
                                <div class="uk-card-header">
                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                        <div class="uk-width-auto">
                                            <a href="#"><img class="uk-border-circle" width="40" height="40" src="{{ $question->user->profile_photo_url }}" alt="{{ $question->user->name }}"></a>
                                        </div>
                                        <div class="uk-width-expand">
                                            <a href="#"><h5 class="uk-margin-remove-bottom">{{$question->user->name }} @if($question->user->is_premium == 1)<i class="icofont-check-circled text-primary"></i>@endif</h5></a>
                                            <p class="uk-text-meta uk-margin-remove-top">{{ $question->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="uk-flex uk-flex-right">
                                            <div class="px-2"><a class="button small light"><i class="icofont-clock-time px-2"></i>{{ $question->duration }} {{ Str::plural('second', $question->duration) }}</a></div>
                                            <div class="px-2"><a class="button small light"><i class="icofont-check-circle px-2"></i>{{ $question->points }} {{ Str::plural('point', $question->points) }}</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <a href="{{ route('single.question', [ $question->subject_id, $question->id]) }}"> 
                                        <div class="uk-flex">
                                            <div class="px-2">{{ $key + 1 . ')'}} </div>
                                            <div>{!! $question->content !!}</a></div>
                                        </div>
                                        <ol type="A">
                                            <li>{!! $question->A !!}</li>
                                            <li>{!! $question->B !!}</li>
                                            <li>{!! $question->C !!}</li>
                                            <li>{!! $question->D !!}</li>
                                        </ol>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>