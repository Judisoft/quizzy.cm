@include('layouts.dashboard.main')
<div class="row">
    <div class="col-lg-12">
        <div class="panel-content">
            <div class="d-widget-content">
                <div class="d-widget-title bg-light p-2">
                    <h2 class="main-title">Add questions to <span class="text-danger">"{{ $user_quiz->title }}"</span></h2>
                    <h5><i class="icofont-paper"></i> {{ $subject->title }}</h5>
                    <h5 class="p-2"><a href="{{ route('user.quiz', $user_quiz->id) }}"><button class="button softprimary small"><i class="icofont-clip-board"></i>quiz items: <span id="question">0</span></button></a></h5>
                    <select class="browser-default custom-select">
                        <option value="3"> topics</option>
                    </select>
                </div>
                <div class="tabs tab-content">
                    <div id="content_1" class="tabcontent"> 
                        <table class="table-default table table-striped table-bordered table-responsive-md">
                            <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td><input class="uk-checkbox" type="checkbox" id="checkBox" ></td>
                                        <td>{{ $question->content }}</td>
                                        <td>
                                            <button class="button small dark" type="button" uk-toggle="target: #modal-close-default-{{$question->id}}">view</button>
                                        </td>
                                    </tr>
                                    <!-- MODAL -->
                                    <div id="modal-close-default-{{$question->id}}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <h5>{{ $question->content }}</h5>
                                            <hr>
                                            <ol type="A">
                                                <li>{{ $question->A }}</li>
                                                <li>{{ $question->B }}</li>
                                                <li>{{ $question->C }}</li>
                                                <li>{{ $question->D }}</li>
                                            </ol>
                                            <button class="button dark small" onclick="addQuestion({{ $question }}, {{ $user_quiz }})" id="addBtn"> add to quiz <i class="icofont-files-stack"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right p-3"> {{ $questions->links('pagination::bootstrap-4') }} </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    let quizContainer = JSON.parse(localStorage.getItem("data")) || []
    let search = quizContainer.find((x) => x.id === question.id) || []
    let u_quizzes = {!! json_encode($user_quiz) !!} 
    let selectedQuestion = document.getElementById("question")
    let checkBox = document.getElementById("checkBox")
    // notification function

    function notification(type, outputMessage)
    {
        UIkit.notification({
            message: outputMessage,
            status: type,
            pos: 'bottom-right',
            timeout: 5000
        });
    }


    function getDataFromLocagalStorage()
    {
        if (search === undefined)
        {
            selectedQuestion.innerHTML = 0
        }
        else{
            selectedQuestion.innerHTML = quizContainer.length
            
        }
    }

    getDataFromLocagalStorage();

    function addQuestion(question, quiz)
    {
        let search = quizContainer.find((q) => q.id === question.id) // search if question already exists in quizContatainer

        if (search === undefined)
        {
            quizContainer.push(
            {
                id: question.id,
                content: question.content,
                optionA: question.A,
                optionB: question.B,
                optionC: question.C,
                optionD: question.D,
                quizId: quiz.id,
                quizTitle: quiz.title

            })
            
            notification('success', 'Question added succesfully');
        } else {
            notification('danger', 'Question already added')
        }
        
        selectedQuestion.innerHTML = quizContainer.length
        
        // save data to local storage

        localStorage.setItem("data", JSON.stringify(quizContainer))

    }
</script>