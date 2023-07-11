@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h4 class="main-title">Select Subject</h4>
                <div class="row merged20">
                    @foreach($subjects as $subject)
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                            <div class="d-widget d-widget-action">
                                <div class="d-widget-title">
                                    <h5>{{$subject->title}}</h5>
                                </div>
                                <div class="d-widget-content">
                                    <span class="realtime-ico pulse"></span>
                                    <h6><a href="{{ route('subject.questions', $subject->id) }}">Create Quiz</a></h6>
                                    <h5>{{ $subject->questions->count() }}</h5>
                                    <i class="icofont-light-bulb"></i>  
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->