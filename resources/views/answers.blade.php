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
    <body class="p-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 col-md-8 col-sm-8">
                    <div>
                        <div class="p-3">
                            <h2 class="text-uppercase text-center text-dark" style="font-weight:900">{{ $quiz->title }}</h2>
                        </div>
                        <div>
                            <table class="table table-striped table-hover p-5">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>SN</th>
                                        <th>Question</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th>Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quiz->questions as $key=>$question)
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{$question->content}}</td>
                                            <td>{{ $question->A }}</td>
                                            <td>{{ $question-> B}}</td>
                                            <td>{{ $question->C }}</td>
                                            <td>{{ $question->D }}</td>
                                            <td class="bg-dark text-light">{{ $question->answer }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <footer class="text-center small" style="position:absolute;bottom:10px;left:50%;opacity:0.5">&copy; 2023 Studentportal CM</footer>
                    </div>
                </div>
            </div>
            <div class="row align-items-right justify-content-end">
                <div class="col-lg-3">
                    <button class="btn btn-dark" onclick="window.print()"><i class="fa fa-print px-2"></i> Print Answer Sheet</button>
                </div>
            </div>
        </div>    
    </body>
</html>