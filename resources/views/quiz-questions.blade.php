@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div id="printValidationMsg"></div>
                <div class="uk-grid-small"  uk-grid>
                    <h2 class="main-title">Create quiz</h2>
                    <div class="uk-width-1-4@s">
                        <input class="uk-input" type="text" name="title" placeholder="Enter quiz title" id="quizTitle">
                    </div>
                    <div class="uk-width-1-4@s">
                        <button onclick="createQuiz()" type="submit" class="button success submitBtn" id="createBtn">Create Quiz</button>
                    </div>
                </div>
                <div id="userQuizzes" class="mt-3"></div>
                <div class="bg-light rounded px-3 mt-3">
                    <ul uk-accordion>
                        <li>
                            <a class="uk-accordion-title" href="#">My Quizzes</a>
                            <div class="uk-accordion-content">
				                {{-- <div id="uQuizzes"></div> --}}
                                @forelse($user_quizzes as $user_quiz)
                                    <p><a href="{{ route('add.quiz.questions', [$subject_id, $user_quiz->id]) }}">{{ $user_quiz->title }}</a></p>
                                @empty
                                    <img src="{{ asset('images/empty-folder.png') }}" class="img-sm">
                                    <h5 class="opacity-3 p-3">No quiz</h5>
                                @endforelse
				            </div>
                        </li>
                    </ul>
                </div>
                <div class="row merged20 my-4" >
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="d-widget" id="quizQuestions">
                            <div class="d-widget-title">
                                <div id="qTitle"></div>
                                <h5 class="p-2"><a href="{{ route('user.quiz', $user_quiz->id) }}"><button class="button light small">Quiz questions  <span id="question">0</span></button></a></h5>
                                <select class="browser-default custom-select">
                                    <option value="3">topics</option>
                                </select>
                            </div>
                            
                            <div class="d-widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent"> 
                                        <table class="table-default table table-striped table-bordered table-responsive-md">
                                            <tbody>
                                                @foreach($questions as $question)
                                                    <tr>
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
                                                            <button class="button primary small" onclick="addQuestion({{ $question }}, {{ $user_quizzes }})" id="addBtn"><i class="icofont-plus"></i> add to quiz</button>
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
            </div>
        </div>
    </div>
</div><!-- main content -->
<script>
    // let questions = {!! json_encode($questions) !!}
    let selectedQuestion = document.getElementById("question")
    let quizContainer = JSON.parse(localStorage.getItem("data")) || []
    let search = quizContainer.find((x) => x.id === question.id) || []
    let quizQuestions = document.getElementById("quizQuestions");
    let userQuizzes = document.getElementById("userQuizzes")
    // let uQuizzes = document.getElementById("uQuizzes")
    let u_quizzes = {!! json_encode($user_quizzes) !!} // authenticated user's quizzes
    let addBtn = document.getElementById("addBtn")
    let printValidationMsg = document.getElementById("printValidationMsg")
    

    // hide questions on page load

    function hideQuestionList()
    {
        quizQuestions.style.display = 'none'
    }

    hideQuestionList()

    // function displayUsersQuizzes()
    // {
        
    //     uQuizzes.innerHTML = u_quizzes.map((q) => {
    //         return `<p><a href="#">${q.title}</a></p>`
    //     }).join('')
    // }

    // displayUsersQuizzes()
    
    // render Question list
    function renderQuestionList()
    {
        document.getElementById("qTitle").innerHTML = `<h3 class="main-title">${u_quizzes[0].title}</h3>`
        quizQuestions.style.display = 'block'
    }

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

    // create quiz
    function createQuiz()
    {
        let createBtn = document.getElementById("createBtn")
        createBtn.textContent = `Creating quiz ...`
        quiz_title = document.getElementById("quizTitle").value
        axios.post('/create-quiz/post', {
            title: quiz_title,
            user_id: "{{ auth()->user()->id }}"
        })
        .then(function (response) {
            let message = response.data.success
            printValidationMsg.innerHTML = `<div class="uk-alert-success" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p>${message}</p>
                                            </div>`
            notification('success', message)
            createBtn.textContent = 'Create quiz'

            // render quizzes
            let quizzes = response.data.quizzes;
            userQuizzes.innerHTML = `<div class="uk-alert-light pt-3" uk-alert>
                                        <button onclick="renderQuestionList()" class="button dark small"> Add questions to ${quizzes[quizzes.length - 1].title} quiz</button>
                                    </div>`

            // uncomment this code to render all quizzes
            // userQuizzes.innerHTML = quizzes.map((q) => {
            //     return `<tr>
            //                 <a href="#">${q.title}</a><br>
            //             </tr>`
            // }).join('')

            
        })
        .catch(function (error) {
            let message = error.response.data.errors.title[0]
            printValidationMsg.innerHTML = `<div class="uk-alert-danger" uk-alert>
                                    <a class="uk-alert-close" uk-close></a>
                                    <p>${message}</p>
                                    </div>`
            notification('danger', message)
            
            createBtn.textContent = 'Create quiz'
        });

    }
        

    // get number of items from local storage

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
                quizId: quiz[0].id,
                quizTitle: quiz[0].title

            })

            notification('success', 'Question added succesfully');
        } else {
            notification('danger', 'Question already added')
        }
        
        selectedQuestion.innerHTML = quizContainer.length
        
        // save data to local storage

        localStorage.setItem("data", JSON.stringify(quizContainer))

    }
    // adding questions to quiz

</script>