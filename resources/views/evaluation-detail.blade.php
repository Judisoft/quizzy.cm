@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h4 class="main-title text-capitalize">{{ $quiz->title }}</h4>
                <div class="row merged20 mb-4">
                    <div class="col-lg-8">
                        @foreach ($questions as $key=>$question)
                            @if ($quiz->attempts_permitted == $score->attempts)
                                <div class="d-widget mb-4">
                                    <div class="d-widget-title">
                                        <h5 class="text-capitalize">{{ ($key + 1). '.' .$question->content }}</h5>
                                    </div>
                                    <div class="d-widget-content">
                                        <ol type="A">
                                            <li>{{ $question->A }}</li>
                                            <li>{{ $question->B }}</li>
                                            <li>{{ $question->C }}</li>
                                            <li>{{ $question->D }}</li>
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->