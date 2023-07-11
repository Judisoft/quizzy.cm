@include('layouts.dashboard.main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="title-content">
                    <h2 class="main-title fw-700">Add Question</h2>
                    <a href="{{ route('index.questions') }}"><button class="button primary float-right">my questions</button></a>
                </div>
                @if($errors->any())
                    <div class="rounded" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p class="text-danger">Oups! Something went wrong. Check the form for errors</p>
                    </div>
                @endif
                <form method="post" action="{{ route('store.question') }}">
                    @csrf
                    <div class="d-widget mb-4" style="background-color:#EEEEF5;">
                        <div class="d-widget-content">
                            <div class="row p-2">
                                <div class="col p-2">
                                    <h4 class="main-title">Level</h4>
                                    <div class="uk-margin">
                                        <select class="uk-select" name="level">
                                            <option  value="">select level</option>
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}" class="text-capitalize">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('level'))<p class="text-danger">{{ $errors->first('level') }}</p>@endif
                                    </div>
                                </div>
                                <div class="col p-2">
                                    <h4 class="main-title">Subject</h4>
                                    <div class="uk-margin">
                                        <select class="uk-select" name="subject">
                                            <option value="">select subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}" class="text-capitalize">{{ $subject->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('subject'))<p class="text-danger">{{ $errors->first('subject') }}</p>@endif
                                    </div>
                                </div>
                                <div class="col p-2">
                                    <h4 class="main-title">Topic</h4>
                                    <div class="uk-margin">
                                        <select class="uk-select" name="topic">
                                            <option value="">select topic</option>
                                            @foreach ($topics as $t)
                                                <option value="{{ $t->id }}" class="text-capitalize">{{ $t->topic }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('topic'))<p class="text-danger">{{ $errors->first('topic') }}</p>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-widget mb-4">
                        <div class="d-widget-content">
                            <h4 class="main-title">Question</h4>
                            <textarea class="uk-textarea"  placeholder="Type your question here"   id="content" name="content" rows="3">{{ old('content') }}</textarea></p>
                            @if($errors->has('content'))<p class="text-danger">{{ $errors->first('content') }}</p>@endif
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
                                @if($errors->has('A'))<p class="text-danger">{{ $errors->first('A') }}</p>@endif
                            </div>
                            <div class="d-widget-content">
                                <h4 class="main-title opacity-3">Option B</h4>
                            </div>
                            <div class="d-widget-content mb-4">
                                <p><textarea class="uk-textarea" placeholder="Enter Option B"  id="optionB" name="B"></textarea></p>
                                @if($errors->has('B'))<p class="text-danger">{{ $errors->first('B') }}</p>@endif
                            </div>
                            <div class="d-widget-content">
                                <h4 class="main-title opacity-3">Option C</h4>
                            </div>
                            <div class="d-widget-content mb-4">
                                <textarea class="uk-textarea" placeholder="Enter Option C"  id="optionC" name="C"></textarea>
                                @if($errors->has('C'))<p class="text-danger">{{ $errors->first('C') }}</p>@endif
                            </div>
                            <div class="d-widget-content">
                                <h4 class="main-title opacity-3">Option D</h4>
                            </div>
                            <div class="d-widget-content mb-4">
                                <p><textarea class="uk-textarea" placeholder="Enter Option D"  id="optionD" name="D"></textarea></p>
                                @if($errors->has('D'))<p class="text-danger">{{ $errors->first('D') }}</p>@endif
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
                                @if($errors->has('answer'))<p class="text-danger">{{ $errors->first('answer') }}</p>@endif
                            </div>
                        </div>
                    </div>
                    <div class="d-widget mb-4">
                        <div class="d-widget-content">
                            <h4 class="main-title">Mark allocation</h4>
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="number" min="1" name="points" id="points"  placeholder="Enter the number of points">
                                    <p class="pt-2">If no mark is set, it defaults to 1 point</p>
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
                            <button  class="button primary" id="submitBtn">Save Question</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function validateLetterOnly(event)
    {
        let options = ['A', 'B', 'C', 'D']
        let key = event.key
        
        if(key.match(/^[A-Za-z]+$/) && options.includes(key))
        {
            document.getElementById("error").innerHTML = `<span class="icofont-check-alt text-success px-2 p">Valid answer format</span>`
        } else {
            document.getElementById("error").innerHTML = "Please enter a valid option. Answer can only be A, B, C, or D."

        }
    }


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