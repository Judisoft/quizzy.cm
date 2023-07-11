@include('layouts.dashboard.main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="d-flex flex-row">
                    <div class="p-2">
                        <h4 class="main-title">My Questions</h4>
                    </div>
                    <div class="p-2">
                        <a href="#" class="button small primary">Add questions</a>
                    </div>
                </div>
                <p>Select questions to add to create quiz</p>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        @if($errors->any())
                        <div class="rounded" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{ route('post-quiz') }}" method="POST">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="uk-margin p-2 mt-3">
                                    <input type="text" class="uk-input" name="quiz_title" value="{{ old('quiz_title') }}" placeholder="Enter quiz title">
                                </div>
                                <div class="uk-margin p-2">
                                    <select class="uk-select" name="subject_id">
                                        <option value="">select subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="p-2 mt-3">
                                    <button type="submit" class="button primary float-right">Create Quiz</button>
                                </div>
                            </div>
                            @foreach ($questions as $question)
                                <div class="p-2">
                                    <input type="checkbox" value="{{ $question->id }}" name="question[]">
                                    <label for="question">{!! $question->content !!}</label>
                                    <ol type="A">
                                        <li>{!! $question->A !!}</li>
                                        <li>{!! $question->B !!}</li>
                                        <li>{!! $question->C !!}</li>
                                        <li>{!! $question->D !!}</li>
                                    </ol>
                                </div>
                            @endforeach
                            <div class="text-center">
                                {{ $questions->links('pagination::bootstrap-4') }}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>