@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h2 class="main-title">{{ $quiz->title }}</h2>
                <div class="uk-flex uk-flex-between pb-2">
                    <div class="p-3"><button class="button dark small" onclick="saveQuiz()" id="saveBtn"><i class="icofont-save"></i> Save Quiz</button></div>
                    <div class="p-3">
                        <button class="button danger small" onclick="clearLocalStorage()" id="deleteBtn">
                            <i class="icofont-trash"></i>
                            clear all
                        </button>
                    </div>
                    <div class="p-3"><button class="button light small">Questions: <span id="question">0</span></button></div>
                </div>
                <div class="row merged20 mb-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="d-widget">
                            <div class="d-widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent"> 
                                        <div id="quizQuestions"></div>
                                    </div>
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

    let quizContainer = JSON.parse(localStorage.getItem("data")) || [];
    let question = document.getElementById("question")
    let quizQuestions = document.getElementById("quizQuestions")
    let label = document.getElementById("label")
    let saveBtn = document.getElementById("saveBtn")
    let deleteBtn = document.getElementById("deleteBtn")
    // console.log(quizContainer)

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
    
    question.innerHTML = quizContainer.length
    // render quiz questions from local storage

    function renderQuestions()
    {
        if(quizContainer.length !== 0)
        {
            return quizQuestions.innerHTML = quizContainer.map((q)=> {

                let {id, content, optionA, optionB, optionC, optionD} = q;

                return `<div class="uk-alert-light" uk-alert>
                            <a onclick="removeQuestion(${id})" class="uk-alert-close" uk-close></a>
                            <ul style="list-style-type:square">
                            <li>${content}</li>
                                <ol type="A">
                                    <li> ${optionA}</li>
                                    <li> ${optionB}</li>
                                    <li> ${optionC}</li>
                                    <li> ${optionD}</li>
                                </ol>
                            </ul>
                        </div>
                        `
            }).join('')
        } 
        else 
        {
            saveBtn.style.display = 'none'
            return quizQuestions.innerHTML = `<div class="text-center">
                                                    <img src="{{ asset('images/empty-folder.png') }}" class="img-sm">
                                                    <h5 class="opacity-3 p-3">Quiz Basket Empty </h5>
                                                    <a href="{{ route('show.questions') }}" class="text-center"><button class="button dark small">Add questions</button></a>
                                                </div>
                                            `
        }

    }

    renderQuestions();
    // remove question from local storage
    function removeQuestion(id)
    {
        quizContainer = quizContainer.filter((q) => q.id !== id);
        localStorage.setItem("data", JSON.stringify(quizContainer));
        //update number of questions
        question.innerHTML = quizContainer.length
        renderQuestions();
    }

    // save quiz

    function saveQuiz(quiz_question)
    {

        let saveBtn = document.getElementById("saveBtn")
        saveBtn.textContent = 'Saving  quiz ...'
        quizContainer.map((q) => {
            axios.post('/user_quiz/save-quiz', {

            quiz_id: q.quizId,
            question_id: q.id,

            })
            .then(function (response) {
            let message = response.data.success
            notification('success', message)
            saveBtn.textContent = 'Save quiz'


            })
            .catch(function (error) {
            let message = 'Oups! Something went wrong'
            notification('danger', message)
            saveBtn.textContent = 'Save quiz'
            });

        })
        localStorage.removeItem("data");  // clear local storage
    }

    // clear all - delete all items from local storage

    function clearLocalStorage()
    {
        localStorage.removeItem("data")
        renderQuestions()
        deleteBtn.style.display = 'none'

    }

</script>