@include('layouts.dashboard.main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <form action="{{ route('update.quiz', $quiz->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="d-widget mb-4" style="background-color:#EEEEF5;">
                        <div class="d-widget-content">
                            <h1 class="text-center fw-700">Update Quiz</h1>
                            <div class="d-flex flex-column p-2">
                                <div class="p-2">
                                    <p class="main-title">Quiz Title</p>
                                    <input class="uk-input" name="quiz_title" value="{{ $quiz->title }}">
                                </div>
                                <div class="p-2">
                                    <div class="uk-margin">
                                        <p class="main-title">Subject</p>
                                        <select class="uk-select" name="subject_id" onchange="sortTopics()">
                                            <option value="">select subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $quiz->subject->id }}"  {{ $quiz->subject->id == $subject->id ? 'selected' : '' }}>{{ $subject->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="p-2">
                                    @foreach ($quiz->questions as $question)
                                        <div class="p-3">
                                            <input class="uk-checkbox" type="checkbox" name="question_id[]" value="{{ $question->id }}" checked>  {!! $question->content !!} <br>
                                            <div class="ml3">
                                                <ol type="A">
                                                    <li>{!! $question->A !!}</li>
                                                    <li>{!! $question->B !!}</li>
                                                    <li>{!! $question->C !!}</li>
                                                    <li>{!! $question->D !!}</li>
                                                </ol>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="p-2">
                                    @foreach ($user_questions as $question)
                                        @if(!$quiz->questions->contains($question->id))
                                            <div class="p-3">
                                                <input class="uk-checkbox" type="checkbox" name="question_id[]" value="{{ $question->id }}" @if($quiz->questions->contains($question->id)) checked @endif>  {!! $question->content !!} <br>
                                                <div class="ml3">
                                                    <ol type="A">
                                                        <li>{!! $question->A !!}</li>
                                                        <li>{!! $question->B !!}</li>
                                                        <li>{!! $question->C !!}</li>
                                                        <li>{!! $question->D !!}</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="p-2">
                                    <button type="submit" class="button primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- main content -->