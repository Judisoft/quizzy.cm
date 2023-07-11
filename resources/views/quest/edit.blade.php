@include('layouts.dashboard.main')
<style>
    select option {
        text-transform:capitalize !important;
        }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="panel-content">
                <div class="title-content">
                    <h2 class="main-title fw-700">Edit question</h2>
                    <a href="{{ route('index.questions') }}" class="button light float-right">my questions</a>
                </div>
                @if($errors->any())
                    <div class="rounded" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p class="text-danger">Oups! Something went wrong. Check the form for errors</p>
                    </div>
                @endif
                <form method="POST" action="{{ route('update.question', $question->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="d-widget mb-4">
                        <div class="d-widget-content">
                            <div class="uk-flex justify-content-between p-2" style="background-color:#eee;">
                                <div class="uk-form-width-medium p-2">
                                    <h4 class="main-title">Level</h4>
                                    <div class="uk-margin">
                                        <select class="uk-select" name="level">
                                            <option  value="">select level</option>
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}" {{ $question->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('level'))<p class="text-danger">{{ $errors->first('level') }}</p>@endif
                                    </div>
                                </div>
                                <div class="uk-form-width-medium p-2">
                                    <h4 class="main-title">Subject</h4>
                                    <div class="uk-margin">
                                        <select class="uk-select" name="subject" onchange="sortTopics()">
                                            <option value="">select subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"  {{ $question->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('subject'))<p class="text-danger">{{ $errors->first('subject') }}</p>@endif
                                    </div>
                                </div>
                                <div class="uk-form-width-medium p-2">
                                    <h4 class="main-title">Topic</h4>
                                    <div class="uk-margin">
                                        <select class="uk-select" name="topic">
                                            <option value="">select topic</option>
                                            @foreach ($topics as $t)
                                                <option value="{{ $t->id }}"  {{ $question->topic_id == $t->id ? 'selected' : '' }}>{{ $t->topic }}</option>
                                            @endforeach
                                            @if($errors->has('topic'))<p class="text-danger">{{ $errors->first('topic') }}</p>@endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-widget mb-4">
                        <div class="d-widget-content">
                            <h4 class="main-title">Question</h4>
                            <textarea class="uk-textarea"  placeholder="Type your question here"   id="content" name="content" rows="3">{{ $question->content }}</textarea></p>
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
                                <p><textarea class="uk-textarea"  placeholder="Enter Option A"  id="optionA" name="A">{{ $question->A }}</textarea></p>
                                @if($errors->has('A'))<p class="text-danger">{{ $errors->first('A') }}</p>@endif
                            </div>
                            <div class="d-widget-content">
                                <h4 class="main-title opacity-3">Option B</h4>
                            </div>
                            <div class="d-widget-content mb-4">
                                <p><textarea class="uk-textarea" placeholder="Enter Option B"  id="optionB" name="B">{{ $question->B }}</textarea></p>
                                @if($errors->has('B'))<p class="text-danger">{{ $errors->first('B') }}</p>@endif
                            </div>
                            <div class="d-widget-content">
                                <h4 class="main-title opacity-3">Option C</h4>
                            </div>
                            <div class="d-widget-content mb-4">
                                <p><textarea class="uk-textarea" placeholder="Enter Option C"  id="optionC" name="C">{{ $question->C }}</textarea></p>
                                @if($errors->has('C'))<p class="text-danger">{{ $errors->first('C') }}</p>@endif
                            </div>
                            <div class="d-widget-content">
                                <h4 class="main-title opacity-3">Option D</h4>
                            </div>
                            <div class="d-widget-content mb-4">
                                <p><textarea class="uk-textarea" placeholder="Enter Option D"  id="optionD" name="D">{{ $question->D }}</textarea></p>
                                @if($errors->has('D'))<p class="text-danger">{{ $errors->first('D') }}</p>@endif
                            </div>
                        </div>
                    </div>
                    <div class="d-widget mb-4">
                        <div class="d-widget-content">
                            <h4 class="main-title">Answer</h4>
                            <p>Enter the letter corresponding to the correct answer</p>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="text" name="answer" value="{{ $question->answer }}" id="answer" maxlength="1"  placeholder="Enter Answer" onkeypress="validateLetterOnly(event)">
                                @if($errors->has('answer'))<p class="text-danger">{{ $errors->first('answer') }}</p>@endif
                            </div>
                        </div>
                    </div>
                    <div class="d-widget mb-4">
                        <div class="d-widget-content">
                            <h4 class="main-title">Mark allocation</h4>
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="number" value="{{ $question->points }}" min="1" name="points" id="points"  placeholder="Enter the number of points">
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
                                    <input class="uk-input" type="number" value="{{ $question->duration }}" min="1" name="duration" id="duration"  placeholder="Enter the duration">
                                    <p>Enter the duration in seconds. If no duration is set it defaults to 60 seconds</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-form-controls text-right sub">
                            <button  class="button primary" id="submitBtn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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