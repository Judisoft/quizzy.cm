@include('layouts.dashboard.main')

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="panel-content">
            <div class="uk-margin">
                <h2 class="main-title">{{ $subject->title }}</h2>
                <p class="p-2 h5"><i class="icofont-rounded-expand h3"></i> Sort Questions</p>
                <div class="uk-form-controls ml-3">
                    <div class="uk-child-width-expand@s" uk-grid>
                        <div>
                            <select class="uk-select" id="level" name="level" onchange="sortQuestions()">
                                <option value="">Select Level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" class="text-capitalize" >{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select class="uk-select" id="topic" onchange="sortQuestions()">
                                <option value="">Select Topic</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}" class="text-capitalize">{{ $topic->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div id="noItem"></div>
            </div>
            <div id="sorted"></div>
            <div id="toggleQuestions">
                @forelse ($questions as $key => $question)
                    <div class="ml-3">
                        <div class="d-widget mb-4">
                            <div class="d-widget-title">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <a href="#"><img class="uk-border-circle" width="40" height="40" src="{{ $question->user->profile_photo_url }}" alt="{{ $question->user->name }}"></a>
                                    </div>
                                    <div class="uk-width-expand">
                                        <a href="#"><h5 class="uk-margin-remove-bottom fw-600">{{$question->user->name }} @if($question->user->is_premium == 1)<i class="icofont-check-circled text-primary"></i>@endif</h5></a>
                                        <p class="uk-text-meta uk-margin-remove-top">{{ $question->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="uk-flex uk-flex-right">
                                        <div class="px-2">
                                            <button class="button small primary">
                                                <a href="#modal-center-2"  uk-tooltip="share this question with friends" uk-toggle>
                                                    <i class="icofont-share-alt px-2 fw-700"></i>share
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-widget-content">
                                <div class="d-widget-title">
                                    <div class="uk-flex flex-row">
                                        <div class="p-2">
                                            <p class="main-title px-2 uk-underline">{{'Question' .($key + 1) . ':'  }}</p> <br>
                                        </div>
                                        <div class="p-2">
                                            {!! $question->content !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tabcontent px-5">
                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                        <div class="uk-grid-small uk-text-center" uk-grid>
                                            <div onclick="verifyAnswer('A', '{{ $question->answer }}')" class="option"></div>
                                            <label class="uk-flex-right py-1">{!! $question->A !!}</label>
                                        </div>
                                    </div>
                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                        <div class="uk-grid-small uk-text-center" uk-grid>
                                            <div onclick="verifyAnswer('B', '{{ $question->answer }}')" class="option"></div>
                                            <label class="uk-flex-right py-1">{!! $question->B !!}</label>
                                        </div>
                                    </div>
                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                        <div class="uk-grid-small uk-text-center" uk-grid>
                                            <div onclick="verifyAnswer('C', '{{ $question->answer }}')" class="option"></div>
                                            <label class="uk-flex-right py-1">{!! $question->C !!}</label>
                                        </div>
                                    </div>
                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                        <div class="uk-grid-small uk-text-center" uk-grid>
                                            <div onclick="verifyAnswer('D', '{{ $question->answer }}')" class="option"></div>
                                            <label class="uk-flex-right py-1">{!! $question->D !!}</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="renderAnswer"></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>No question yet</tr>
                @endforelse
                <div> {{ $questions->links('pagination::bootstrap-4') }} </div>
            </div>
            {{-- modal for correct answer --}}
            <button class="button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #correct-answer" id="btnToggle" style="display:none"></button>
            <div id="correct-answer" class="uk-flex-top bg-light" uk-modal>
                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="text-center">
                        <img src="{{ asset('images/resources/right-decision.gif') }}" style="height:75px;width:75px;">
                        <h4 class="p-5 fw-700">Correct Answer</h4>
                        <p>Great Job {{ Auth::user()->name }}!</p>
                    </div>
                </div>
            </div>
            {{-- Modal for wrong answer --}}
            <button class="button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #wrong-answer" id="btnToggleWrong" style="display:none"></button>
            <div id="wrong-answer" class="uk-flex-top bg-light" uk-modal>
                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="text-center">
                        <img src="{{ asset('images/resources/wrong-decision.gif') }}" style="height:75px;width:75px;">
                        <h4 class="p-5 fw-700">Wrong Answer</h4>
                        <button type="button" class="button light uk-modal-close" >Try again</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="container mt-4">
            <img src="{{ asset('images/resources/share.svg') }}">
            <div class="mt-3 text-center">{!! $share_btn !!}</div>
        </div>        
    </div>
</div>
<div id="modal-center-2" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="container mt-4">
            <h2 class="text-center fw-500 p-2">Share question</h2>
            <img src="{{ asset('images/resources/share.svg') }}">
            <div class="mt-3 text-center">{!! $share_btn !!}</div>
        </div>        
    </div>
</div>
<script>
    // let topic = document.getElementById("topic")
    let questions = {!! json_encode($questions) !!}
    let toggleQuestions = document.getElementById("toggleQuestions")
    let sorted = document.getElementById("sorted")

    function formatDate(date)
    {
        dayjs.extend(window.dayjs_plugin_relativeTime);
        return dayjs(date).fromNow()
    }


    function displaySortedQuestions(data)
    {
        toggleQuestions.style.display = 'none'

        if(data.length === 0)
        {
            document.getElementById("noItem").innerHTML = `<div class="p-5 text-center mt-5">
                                                                <img class="text-center" src="{{ asset('backend/images/resources/stats4.svg') }}" height="150" width="150">
                                                                <h5 class="opacity-3 pt-3 mb-3">No question available</h5>
                                                                <a href="${window.location.href}"><button class="button small primary">clear filters</button></a>
                                                            </div>`
        }else {
            document.getElementById("noItem").style.display = 'none'
           
        }
        sorted.innerHTML = ""
        data.map((q, key) => {
            sorted.innerHTML +=`<div class="inline-block p-2">
                                    <h5 class="pb-3"><span class="text-primary text-lowercase">${q.level.name} </span> <i class="icofont-curved-right h5"></i> 
                                    <span class="text-primary text-lowercase">${q.subject.title} </span> <i class="icofont-curved-right h5"></i>
                                    <span class="text-primary text-lowercase">  ${q.topic.topic} </span></h5>
                                    <div class="d-widget mb-4">
                                        <div class="d-widget-title">
                                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                <div class="uk-width-auto">
                                                    <a href="#"><img class="uk-border-circle" width="40" height="40" src="${q.user.profile_photo_url}" alt=""></a>
                                                </div>
                                                <div class="uk-width-expand">
                                                    <a href="#"><h5 class="uk-margin-remove-bottom">${q.user.name}</h5></a>
                                                    <p class="uk-text-meta uk-margin-remove-top">${formatDate(q.created_at)}</p>
                                                </div>
                                                <div class="uk-flex uk-flex-right">
                                                    <button class="button small primary">
                                                        <a href="#modal-center" uk-tooltip="share this question with friends" uk-toggle>
                                                            <i class="icofont-share-alt px-2 fw-700"></i>share
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-widget-title">
                                            <div class="uk-flex flex-row">
                                                <div class="p-2">
                                                    <p class="main-title px-2 uk-underline">Question ${key + 1}:</p>
                                                </div>
                                                <div class="p-2">
                                                    ${q.content}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabcontent px-5">
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                <div class="uk-grid-small uk-text-center" uk-grid>
                                                    <div onclick="verifyAnswer('A', '${q.answer}')" class="option"></div>
                                                    <label class="uk-flex-right py-1">${q.A}</label>
                                                </div>
                                            </div>
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                <div class="uk-grid-small uk-text-center" uk-grid>
                                                    <div onclick="verifyAnswer('B', '${q.answer}')" class="option"></div>
                                                    <label class="uk-flex-right py-1">${q.B}</label>
                                                </div>
                                            </div>
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                <div class="uk-grid-small uk-text-center" uk-grid>
                                                    <div onclick="verifyAnswer('C', '${q.answer}')" class="option"></div>
                                                    <label class="uk-flex-right py-1">${q.C}</label>
                                                </div>
                                            </div>
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid p-3 border">
                                                <div class="uk-grid-small uk-text-center" uk-grid>
                                                    <div onclick="verifyAnswer('D', '${q.answer}')" class="option"></div>
                                                    <label class="uk-flex-right py-1">${q.D}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
        })
    }


    function sortQuestions()
    {
        let topicId = document.getElementById("topic").value;
        let levelId = document.getElementById("level").value;
        let subjectId = {!! json_encode($subject_id) !!}

        let quest = questions.data
        
        const sortedQuestions = quest.filter((q) => { 
            if (topicId && levelId) {
               
                return  q.topic_id == topicId && 
                        q.level_id == levelId
            } else {
            
                return q.topic_id == topicId || 
                        q.level_id == levelId
            }
          
        })
        
        displaySortedQuestions(sortedQuestions)

        

        // axios.post('/subjects/'+subjectId+'/quiz-questions/sort-questions', {
        // topic_id: topicId,
        // subject_id: subjectId,
        // level_id: levelId
        // })
        // .then(function (response) {
        //     toggleQuestions.style.display = "none"
        //     let res = response.data
        //     displaySortedQuestions(res)
        //     console.log(res)            
        // })
        // .catch(function (error) {
        //     console.log(error);
        // });

        

    }


    function verifyAnswer(userAnswer, answer) {
       
        if(userAnswer === answer) 
        {
            document.getElementById("btnToggle").click()
            
        } else {
            document.getElementById("btnToggleWrong").click()
        }


    }
</script>