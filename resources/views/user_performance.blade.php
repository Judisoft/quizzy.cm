@include('layouts.dashboard.main')
<style>
    ins{
        color: #fff;
        text-transform: uppercase;
    }
    .icofont-verification-check{
        color: var(--success);
    }
    .icofont-exclamation-circle {
        color: var(--primary);
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content mt-3">
                <h2 class="main-title fw-700 pb-5">User Performance</h2>
                <div class="p-3 text-center" style="background-color:#4267B2; background-size:100% 300px;border-radius:10px;">
                    <img src="{{ $user->profile_photo_url }}" class="rounded-circle" alt="{{ $user->name }}" style="margin-top:-60px;height:100px;width:100px;border:5px solid #4267B2;">
                    <h2 class="main-title text-light fw-700">{{ $user->name }}</h2>   
                    <p class="text-light fw-700">Level {{  $user->level }}</p>
                </div>
                <div class="row  mb-4">
                    <div class="col-lg-12">           
                        <div class="mt-3 d-flex justify-content-center">
                            <table class="table-default table-striped table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Questions</th>
                                        <th>Topic</th>
                                        <th>Checker</th>
                                        <th>Points earned</th>
                                        <th>Date Completed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_performance as $key=>$performance)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <a href="{{ route('show.question', $performance->question->id) }}">{!! $performance->question->content !!}</a>
                                            </td>
                                            <td class="text-capitalize">{{ $performance->question->topic->topic}}</td>
                                            @if($performance->answer_correct == 1)
                                                <td style="background-color:#D7F0E5;color:#36B37E;"><i class="icofont-verification-check"></i> Correct </td> 
                                            @else
                                                <td style="background-color:#ffddd6;color:#ff5630;"> <i class="icofont-close text-danger"></i>Wrong</td>
                                            @endif
                                            <td class="text-center">
                                                @if($performance->answer_correct == 1) {{ $performance->question->points }}
                                                @else 0
                                                @endif
                                            </td>
                                            <td>{{ $performance->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if($user_performance->count() > 50)
                    <div class="bg-dark">{{ $user_performance->links('pagination::bootstrap-4') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>


