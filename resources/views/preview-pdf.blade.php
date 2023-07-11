<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Quizzy</title>
  </head>
    <body class="p-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-8 border p-3" style="background-color:#fff;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                    <div>
                        <div class="p-3">
                            <h3 class="text-uppercase text-center text-dark" style="font-weight:700">{{ $quiz->title }}</h3>
                            <h4>Subject: </h4>
                            <hr>
                            <h4>Instructions:</h4>
                            <hr>
                        </div>
                        <div>
                            @foreach($questions as $key=>$question)
                                <div class="ml-3">
                                    <div class="uk-card uk-card-default>
                                        <div class="uk-card-body">
                                            <h5>
                                                <a href="{{ route('single.question', [ $question->subject_id, $question->id]) }}">
                                                    {{ $key + 1 . ')'}}  {!! $question->content !!}
                                                </a>
                                                <small>({{ $question->points }} {{ Str::plural('point', $question->points) }})</small>
                                            </h5>
                                            <ol type="A">
                                                <li>{{ $question->A }}</li>
                                                <li>{{ $question->B }}</li>
                                                <li>{{ $question->C }}</li>
                                                <li>{{ $question->D }}</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row align-items-right justify-content-center">
                <div class="col-lg-3" id="buttons">
                    <div class="p-2"><button class="btn btn-secondary" onclick="printQuiz()"><i class="fa fa-print px-2"></i> Print this quiz</button></div>
                    <div class="p-2"><button class="btn btn-success" ><i class="fa fa-download px-2"></i> Download pdf</button></div>
                </div>
            </div> --}}
        </div>    
        {{-- <script>
            printDiv = document.getElementById("printDiv")
            buttons = document.getElementById("buttons")

            function printQuiz()
            {
                buttons.style.display = "none"

                window.print()
            }
        </script> --}}
    </body>
</html>