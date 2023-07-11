@include('layouts.dashboard.main')
<style>
    .img-100 {
        height:100px;
        width:100px;
    }
    @media (max-width: 576px) {
        .img-100 {
            height:50px;
            width:50px;
        }
    }

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h1 class="main-title text-center fw-700">What will you learn today?</h2>
                    <div class="row mt-3">
                        <div class="col p-2">
                            <img src="{{ asset('images/resources/student.gif') }}" class="img-100" alt="">
                        </div>
                        <div class="col p-2">
                            <img src="{{ asset('images/resources/dna.gif') }}" class="img-100" alt="">
                        </div>
                        <div class="col p-2">
                            <img src="{{ asset('images/resources/laptop.gif') }}" class="img-100" alt="">
                        </div>
                        <div class="col p-2">
                            <img src="{{ asset('images/resources/chem.gif') }}" class="img-100" alt="">
                        </div>
                        <div class="col p-2">
                            <img src="{{ asset('images/resources/newtons-cradle.gif') }}" class="img-100" alt="">
                        </div>
                    </div>
                <div class="row merged20 pt-5">
                    @foreach($subjects as $subject)
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                            <a class="p" href="{{ route('questions', $subject->id) }}">
                                <div class="subjects">
                                    <div class="rounded p-4 bg-transparent" style="border:2px solid #e5e5e5;">
                                        <h3><i class="icofont-arrow-right px-2 pt-2"></i>
                                        {{$subject->title}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->