@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h2 class="main-title fw-700">Quiz Evaluations</h2>
                <div class="row merged20 mb-4">
                    <div class="col-lg-10">   
                        <div class="mb-4">
                            <div class="d-widget-title">
                                <p class="main-title ml-3">Select quizzes you want to set as an evaluation</p>
                            </div>
                            <div id="sessionMsg"></div>
                            <table class="table-default table table-striped table-hover table-responsive-lg">
                                <thead>
                                <tr>
                                    <th class="wd-35p">Evaluations</th>
                                    <th class="wd-35p">Quiz Title</th>
                                    <th class="wd-25p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user_quizzes as $quiz)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="evaluation" name="evaluation" value="{{ $quiz->id }}" onclick="createEvaluation({{ $quiz->id }})"
                                                @if($quiz->attempts_permitted == 1) checked @endif>
                                            </td>
                                            <td style="font-size:14px;"><a href="{{ route('display.quiz', $quiz) }}">{{ ucfirst(strtolower($quiz->title)) }}</a></td>
                                            <td>
                                                <a href="{{ route('edit.quiz.questions', $quiz->id) }}"><button class="button small soft-primary mx-2"><i class="icofont-pen-alt-1"></i> edit</button></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><p class="text-center">You have not created any quiz</p></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
<script>
    const sessionMsg = document.getElementById('sessionMsg');

    function createEvaluation(quizId, btnId) {
        axios.post('create-evaluation/post', {
            id: quizId
        })
        .then(function (response) {
            sessionMsg.innerHTML = `<div class="rounded" style="background-color: #bce0ef; border:1px solid #4267B2;" uk-alert>
                                        <a class="uk-alert-close" uk-close></a>
                                        <p class="text-dark">${response.data.success}</p>
                                    </div>`
            window.scrollTo({ top: 0, behavior: 'smooth' });
        })
        .catch(function (error) {
            console.log(error);
        });
    }

</script>