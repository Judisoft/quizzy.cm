@include('layouts.dashboard.main')
<style>
    label{
        padding: 10px;
        font-size: 16px;
    }
    .hide {
        display: none;
    }
    .sub > .button {
        font-size: 18px;
    }
    .img-35 {
        width:35px;
        height:35px;
    }
    .icon-wrapper{
        height: 20px;
        width: 20px;
        padding: 5px;
        border-radius:7px;
        background-color: #4267B2;
        color: #fff;
        font-weight:500;
    }
    h4{
        font-weight: 700 !important;
    }

    .uk-notification {
        border-radius:10px !important;
    }
</style>
<div class="container"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="uk-flex uk-flex-between">
                    <div>
                        <h1 class="main-title fw-700">Create Quiz</h1>
                        <p class="fw-500">Add quiz questions or <u><a href="{{ route('index.questions') }}" class="text-primary text-decoration-underline">select questions from Question Bank</a></u></p>
                    </div>
                    <div><button class="btn btn-light" href="#modal-sections" id="qItems" onclick="getQuestionsFromLocalStorage()" style="border:2px solid #ddd;border-radius:10px;" uk-toggle>Question basket <br> <span id="questionCount"></span></button></div>
                    <div id="modal-sections" uk-modal>
                        <!-- Quiz questions model -->
                        <div class="uk-modal-dialog" style="background-color:#f9f4f4;">
                            <button class="uk-modal-close-default" type="button" style="color:#fff;" uk-close></button>
                            <div class="uk-modal-header" style="background-color:#4267B2">
                                <h3 class="main-title text-light">Create Quiz</h3>
                            </div>
                            <div id="q_title"></div>
                            <div class="uk-modal-body uk-overflow-auto">
                                <div id="quizQuestions"></div>
                            </div>
                            <div id="saveQuizBtn"></div>
                        </div><!-- Quiz questions model -->
                    </div>
                </div>
                <div class="row merged20 mb-4">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form action={{ route('store.quiz.questions') }} id="formId" method="post">
                            @csrf
                            <div class="d-widget mb-4"  style="background-color:#EEEEF5;">
                                <div class="d-widget-content">
                                    <div class="row p-2">
                                        <div class="col p-2">
                                            <h4 class="main-title">Level</h4>
                                            <div class="uk-margin">
                                                <select class="uk-select" id="level">
                                                    <option value="">select level</option>
                                                    @foreach ($levels as $level)
                                                        <option value="{{ $level->id }}" class="text-capitalize">{{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col p-2">
                                            <h4 class="main-title">Subject</h4>
                                            <div class="uk-margin">
                                                <select class="uk-select" id="subject">
                                                    <option value="">select subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}" class="text-capitalize">{{ $subject->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col p-2">
                                            <h4 class="main-title">Topic</h4>
                                            <div class="uk-margin">
                                                <select class="uk-select" id="topic">
                                                    <option value="">select topic</option>
                                                    @foreach ($topics as $t)
                                                        <option value="{{ $t->id }}" class="text-capitalize">{{ $t->topic }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-widget mb-4">
                                <div class="d-widget-content">
                                    <h4 class="main-title">Question</h4>
                                    <textarea class="uk-textarea"  placeholder="Type your question here"  id="content" name="content" rows="3"></textarea></p>
                                </div>
                            </div>
                            <div class="d-widget mb-4">
                                <h4 class="main-title"> Answer Options</h4>
                                <div class="d-widget-content">
                                    <div class="d-widget-content">
                                        <h4 class="main-title opacity-3">Option A</h4>
                                    </div>
                                    <div class="d-widget-content mb-4">
                                        <p><textarea class="uk-textarea"  placeholder="Enter Option A"  id="optionA" name="A"></textarea></p>
                                    </div>
                                    <div class="d-widget-content">
                                        <h4 class="main-title opacity-3">Option B</h4>
                                    </div>
                                    <div class="d-widget-content mb-4">
                                        <p><textarea class="uk-textarea" placeholder="Enter Option B"  id="optionB" name="B"></textarea></p>
                                    </div>
                                    <div class="d-widget-content">
                                        <h4 class="main-title opacity-3">Option C</h4>
                                    </div>
                                    <div class="d-widget-content mb-4">
                                        <textarea class="uk-textarea" placeholder="Enter Option C"  id="optionC" name="C"></textarea>
                                    </div>
                                    <div class="d-widget-content">
                                        <h4 class="main-title opacity-3">Option D</h4>
                                    </div>
                                    <div class="d-widget-content mb-4">
                                        <p><textarea class="uk-textarea" placeholder="Enter Option D"  id="optionD" name="D"></textarea></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-widget mb-4">
                                <div class="d-widget-content">
                                    <h4 class="main-title">Answer</h4>
                                    <p>Enter the letter corresponding to the correct answer</p>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" type="text" name="answer" id="answer" maxlength="1"  placeholder="Enter Answer" onkeypress="validateLetterOnly(event)">
                                        <small class="text-danger" id="error"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-widget mb-4">
                                <div class="d-widget-content">
                                    <h4 class="main-title">Mark allocation</h4>
                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <input class="uk-input" type="number" min="1" name="points" id="points"  placeholder="Enter the number of points">
                                            <p>If no mark is set, it defaults to 1 point</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-widget mb-4">
                                <div class="d-widget-content">
                                    <h4 class="main-title">Time allocation</h4>
                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <input class="uk-input" type="number" min="1" name="duration" id="duration"  placeholder="Enter the duration">
                                            <p>Enter the duration in seconds. If no duration is set it defaults to 60 seconds</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-controls text-right sub">
                                    <button  class="button primary" id="submitBtn">Add to quiz basket</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->


<script>
    let quizContainer = JSON.parse(localStorage.getItem("question")) || []
    let choices = document.getElementById("choices")
    let addedQuestions = document.getElementById("questionCount")
    let quizQuestions = document.getElementById("quizQuestions")
    const qItems = document.getElementById("qItems")
    let counter = 1
    let i = 0
    
    function sortTopics()
    {
        // topics = {!! json_encode($topics) !!}
        let subject_id = document.getElementById("subject").value
        // Remove existing options
        let topicIdOut = document.querySelector("#topic")
        Array.from(topicIdOut).forEach((option) => {
            topicIdOut.removeChild(option)
        })
        let topics = {!! json_encode($topics) !!}

        filteredTopics = topics.filter((item) => {
            return item.subject_id === subject_id;
        });

        

        // set new topics here
        
        filteredTopics.map((optionData) => {
            let opt = document.createElement('option')
            opt.appendChild(document.createTextNode(optionData.topic))
            opt.value = optionData.id
            topicIdOut.appendChild(opt)
            opt.setAttribute('value', optionData.id)
        })
                
    }

    function generateChoices()
    {
        const max = 4
        counter++
        if(counter > max)
        {
            
            return;
        }
        let options = ['A', 'B', 'C', 'D']
        let opt = options[counter]
        choices.innerHTML += `<div class="uk-margin">
                                <textarea class="uk-textarea" name="${opt}" placeholder="Option ${opt}" id="option${opt}" onclick="showCKEditor('option${opt}')"></textarea>
                            </div>`


    }

    
    // notification function

    function notification(type, outputMessage)
    {
        UIkit.notification({
            message: outputMessage,
            status: type,
            pos: 'top-center',
            timeout: 5000
        });
    }

    function validateLetterOnly(event)
    {
        let options = ['A', 'B', 'C', 'D']
        let key = event.key
        
        if(key.match(/^[A-Za-z]+$/) && options.includes(key))
        {
            document.getElementById("error").innerHTML = `<i class="icofont-check-alt text-success px-2 p">Valid answer format</i>`
        } else {
            document.getElementById("error").innerHTML = "Please enter a valid option. Answer can only be A, B, C, or D."

        }
    }

     // create quiz
     function createQuiz()
    {
        const quiz_title = document.getElementById("quizTitle").value
        const subject_id = document.getElementById("subject").value

        if (quiz_title && subject_id){
            let quiz_attribs = [{
                title: quiz_title,
                subject: subject_id
            }]
            localStorage.setItem("quiz", JSON.stringify(quiz_attribs))
        }
        axios.post('/quizzes/create-a-quiz/post', {
            title: quiz_title,
            user_id: "{{ auth()->user()->id }}",
            subject_id: subject_id
        })
        .then(function (response) {
            console.log(response.data.error['title'][0])
            let message = response.data.error['title'][0]
            notification('success', message)
            // document.getElementById("quizTitle").setAttribute('disabled', 'disabled')

        })
        .catch(function (error) {
            
           console.log(error)
            // notification('danger', message)
            
        });


    }

    // Save questions to local storage

    document.getElementById("submitBtn").addEventListener("click", function(event) {
        event.preventDefault();

        if(tinyMCE.get('content').getContent() &&
            tinyMCE.get('optionA').getContent() &&
            tinyMCE.get('optionB').getContent() &&
            document.getElementById('answer') &&
            document.getElementById('duration') &&
            document.getElementById('points') &&
            document.getElementById('level') &&
            document.getElementById('subject') &&
            document.getElementById('topic')
            )
        {
            quizContainer.push({
                id: quizContainer.length + 1,
                content: tinyMCE.get('content').getContent(),
                optionA: tinyMCE.get('optionA').getContent(),
                optionB: tinyMCE.get('optionB').getContent(),
                optionC: tinyMCE.get('optionC').getContent(),
                optionD: tinyMCE.get('optionD').getContent(),
                answer: document.getElementById('answer').value,
                duration: document.getElementById('duration').value,
                points: document.getElementById('points').value,
                level_id: document.getElementById('level').value,
                subject_id: document.getElementById('subject').value,
                topic_id: document.getElementById('topic').value
            });

            localStorage.setItem("question", JSON.stringify(quizContainer))
            notification('success', 'Question added succesfully');
            questionCounter();
            document.getElementById("qItems").style.display = 'block'
            document.getElementById("formId").reset();

        } else {
            notification('danger', 'Nothing to add')
        }


    })

    function getQuestionsFromLocalStorage() {
        quizQuestions.innerHTML = ''
        if (quizContainer.length > 0) {
            document.getElementById("q_title").innerHTML = `<div class="uk-margin p-3 rounded mt-4" style="background-color:#eee;">
                                                                <div class="uk-flex justify-content-between sub">
                                                                    <input class="uk-input rounded-0" type="text" id="quizTitle" placeholder="Enter quiz title">
                                                                </div>
                                                            </div>`
            quizContainer.forEach((question, index) => {
            quizQuestions.innerHTML += ` <div class="d-widget mb-4" uk-alert id="modal">
                                            <div class="d-widget-title"><h5>Question ${index + 1}</h5></div>
                                            <div class="d-widget-content">
                                                <h4>${question.content}</h4>
                                                <h6 class="uk-heading-line uk-text-center"><span>answer choices</span></h6>
                                                <ol type="A">
                                                    <li>${question.optionA}</li>
                                                    <li>${question.optionB}</li>
                                                    <li ${question.optionC}</li>
                                                    <li ${question.optionD}</li>
                                                </ol>
                                            </div>
                                            <div class="border-top">
                                                <div class="mt-2">
                                                    <button  class="button light small"><i class="icofont-clock-time"></i> ${question.duration} seconds</button>
                                                    <button  class="button light small"><i class="icofont-check-circled"></i> ${question.points} point(s)</button>
                                                </div>
                                            </div>
                                        </div>
                                        `})
        document.getElementById("saveQuizBtn").innerHTML = `<div class="uk-modal-footer sub">
                                                                <button class="button primary btn-block" type="button" onclick="saveQuiz()"> Create quiz</button>
                                                            </div>`
        } else {
            quizQuestions.innerHTML += ` <div uk-alert id="modal">
                                            <h4 class='text-center fw-700'>Questions basket is empty</h4>
                                            <p class='text-center p-2'>A quiz must contain at least one question</p>
                                        </div>
                                        `
        }
    }

    // getQuestionsFromLocalStorage();

    // local storage question counter

    function questionCounter() {
        if(quizContainer.length >= 0) {
            addedQuestions.innerHTML = `${quizContainer.length}`
        } else {
            // document.getElementById("qItems").style.display = 'none'
        }
    }

    questionCounter();

    qItems.addEventListener("click", getQuestionsFromLocalStorage())

    // localStorage.removeItem("question")

    function selectSubject(subject_id) {
        return subject_id;
    }

    function saveQuiz(){
        const qTitle = document.getElementById("quizTitle").value
        quizContainer.forEach((q) => {
            axios.post('/create-a-quiz', {
            quiz_title: qTitle,
            content: q.content,
            optionA: q.optionA,
            optionB: q.optionB,
            optionC: q.optionC,
            optionD: q.optionD,
            answer: q.answer,
            points: q.points,
            duration: q.duration,
            subject_id: q.subject_id,
            topic_id: q.topic_id,
            level_id: q.level_id

        })
        .then(function (response) {
            localStorage.removeItem('question')
            questionCounter()
            alert('Your quiz was successfully created')
            
        })
        .catch(function (error) {
            console.log(error);
            // notification('danger', 'Something went wrong. Try again!')
        });
        })
    }
</script>
<script>
    tinymce.init({
      selector: 'textarea#content',
      height: 250,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    tinymce.init({
      selector: 'textarea#optionA',
      height: 250,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    tinymce.init({
      selector: 'textarea#optionB',
      height: 250,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    tinymce.init({
      selector: 'textarea#optionC',
      height: 250,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    tinymce.init({
      selector: 'textarea#optionD',
      height: 250,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
