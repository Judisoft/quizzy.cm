@include('layouts.dashboard.main')
<style>
    .option{
        height:25px;
        width:25px;
        border:2px solid#1DA1F2;
        border-radius:50%;
        background-color:#fff;
    }
    .option:hover{
        background-color:#1DA1F2;
    }
    #progress{
    width : 500px;
    padding:5px;
    text-align: right;
    }
    .prog{
        width : 10px;
        height : 10px;
        border: 1px solid #000;
        display: inline-block;
        border-radius: 50%;
        margin-left : 5px;
        margin-right : 5px;
    }
    #timer{
    position: relative;
    text-align: center;
    padding: 1rem;
}
    #counter{
        font-size: 1.5em;
    }
    #btimeGauge{
        width : 300px;
        height : 10px;
        border-radius: 10px;
        background-color: lightgray;
        margin-left : 25px;
    }
    #timeGauge{
        height : 10px;
        border-radius: 10px;
        background-color: mediumseagreen;
        margin-top : -10px;
        margin-left : 25px;
    }
    .uk-radio{
        height:25px;
        width:25px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel-content">
                <div id="alertMessage" class="text-white px-4 py-3 mb-2 rounded relative" role="alert" style="display:none;">
                    <strong class="font-bold" id="message"></strong>
                </div>
               <div class="d-widget">
                    <div class="d-widget-title" style="overflow:none">
                        <h3 class="main-title">{!! $question->content !!}</h3>
                    </div>
                    <div class="uk-flex uk-flex-column">
                        <div class="p-3"><label><input class="uk-radio" name="choice" type="radio" value="A"> {!! $question->A !!}</label></div>
                        <div class="p-3"><label><input class="uk-radio" name="choice" type="radio" value="B"> {!! $question->B !!}</label></div>
                        <div class="p-3"><label><input class="uk-radio" name="choice" type="radio" value="C"> {!! $question->C !!}</label></div>
                        <div class="p-3"><label><input class="uk-radio" name="choice" type="radio" value="D"> {!! $question->D !!}</label></div>
                    </div>
               </div>
                <div class="uk-flex uk-flex-between">
                    <div class="p-5 mb-3" id="verifyAnswer">
                        <button onclick="verifyAnswer()" class="button danger">Submit Answer <i class="icofont-hand-drag1 h5"></i></button>
                    </div>
                    <div class="p-5 mb-3" id="nextQ" style="display: none">
                        <button class="button dark"><a  href="{{ route('single.question', [$subject, $next_qid])}}"> Next Question<i class="icofont-arrow-right h5"></i></a></button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    let question = {!! json_encode($question) !!}
    let subject = {!! json_encode($subject) !!}
    // console.log(question.answer)
    function verifyAnswer() {
        let choices = document.getElementsByName('choice')
        for(i = 0; i < choices.length; i++) {
            
            if(choices[i].checked) {
                if(choices[i].value === question.answer) {
                    
                    document.getElementById('alertMessage').style.cssText = "display:block;background-color:#32d296;"
                    document.getElementById('message').innerHTML = `<i class='icofont-check-circled h5'></i> Correct Answer, Great Job !`
                    document.getElementById('nextQ').style.display = 'block'
                    document.getElementById('verifyAnswer').style.display = 'none'
                    // let nextId = question.id + 1
                    // console.log(nextId)

                } else {
                    document.getElementById('alertMessage').style.cssText = "display:block;background-color:#ff5630;"
                    document.getElementById('message').innerHTML = `<i class='icofont-close-circled h5'></i> Incorrect answer! Try again.`
                }
                
            }
            
        }
    }
</script> 