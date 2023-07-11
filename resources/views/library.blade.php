@include('layouts.dashboard.main')
<style>
    .icon-bg{
        height:50px;
        width:50px;
        padding: 5px;
        border-radius:5px;
        background-color: #ddd;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="uk-flex uk-flex-between">
                    <div class="p-2">
                        <h4 class="main-title">My Quiz Library</h4>
                    </div>
                    <div class="p-2">
                        <a  href="{{ route('index.questions') }}"><button class="button circle  primary">My Questions</button></a>
                    </div>
                </div>
                <div class="row merged20 mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="p-2" uk-sticky="offset:100;media : @m; top:20">
                            <ul class="menu-slide">
                                <li class="">
                                    <a class="text-secondary" title="" onclick="createdByMe()">
                                        <i class="icofont-user-alt-3 icon-bg"></i> Created by me
                                        <span class="badge badge-dark text-right">{{ $quizzes->count() }}</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="text-secondary"title="" onclick="likedByMe()">
                                        <i class="icofont-heart icon-bg"></i> Liked by me
                                        <span class="badge badge-dark text-right">{{ $liked_quizzes->count() }}</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="text-secondary" title="" onclick="sharedWithMe()">
                                        <i class="icofont-share icon-bg"></i> Shared with me
                                        <span class="badge badge-dark text-right">{{ $shared_quizzes->count() }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div id="scroll-basic">
                            <div id="content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
<script>
    let sectionToRender = document.getElementById("content")

    function formatDate(date)
    {
        dayjs.extend(window.dayjs_plugin_relativeTime);
        return dayjs(date).fromNow()
    }


    function renderContent(contentToRender)
    {
        sectionToRender.innerHTML =`${contentToRender ?
                                            `<div class="uk-flex justify-content-center">
                                                <table class="table table-default table-borderless table-striped table-hover table-responsive-md bg-transparent">
                                                    <thead class="h6 border-bottom">
                                                        <th>Quiz</th>
                                                        <th>Subject</th>
                                                        <th>Attempted</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        ${contentToRender ? contentToRender : tableHead}
                                                    </tbody>
                                                </table>
                                            </div>`
                                        : ''
                                        }` 
                                    
                                    
    }
    

    function createdByMe()
    {
        const quizzes = {!! json_encode($quizzes) !!}
        const content =   quizzes.map((q) => {
                return ` <tr>
                            <td class="text-capitalize text-primary">
                                <a href="/quiz/${q.slug}">
                                    ${q.title}
                                </a>
                            </td>
                            <td>${q.subject.title}</td>
                            <td>${q.views}</td>
                            <td>${formatDate(q.created_at)}</td>
                            <td class='uk-flex flex-row'>
                                <a href="/quiz/edit/${q.id}"><button class="button small soft-primary mx-2"><i class="icofont-pen-alt-1"></i></button></a>
                                <form action="" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="sumit" class="button small soft-danger" onclick='return confirm("Are you sure you want to delete this question?")'><i class="icofont-trash"></i></button>
                                </form>
                            </td>
                        </tr>`
            }).join('')  
            renderContent(content)

        if(Object.keys(quizzes).length === 0)
        {
            sectionToRender.innerHTML = `<div class="uk-flex justify-content-center">
                                            <figure style="height:200px;width:200px;"><img alt="" src="{{ asset('images/resources/library.png') }}"></figure>
                                        </div>
                                        <div class="text-center p-2">
                                            <h6>Create your first quiz</h6>
                                            <p>Get questions from our library of make your own. It's quick and easy</p>
                                            <a href="{{ route('create.quiz') }}"><button class="button primary">Create a quiz</button></a>
                                        </div>`
                            
        }
    }

    createdByMe()

    function likedByMe()
    {
        let likedQuizzes = {!! json_encode($liked_quizzes) !!}

        let content =   likedQuizzes.map((q) => {
                return `<tr>
                            <td class="text-capitalize text-primary">
                                <a href="/quiz/${q.quiz.slug}">
                                   ${q.quiz.title}
                                </a>
                            </td>
                            <td>${q.quiz.subject.title}</td>
                            <td>${q.quiz.views}</td>
                            <td>${formatDate(q.created_at)}</td>
                            <td class='uk-flex flex-row'>
                                <button type="sumit" class="button small soft-primary mx-2"><i class="icofont-pen-alt-1"></i></button>
                                <form action="" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="sumit" class="button small soft-danger" onclick='return confirm("Are you sure you want to delete this question?")'><i class="icofont-trash"></i></button>
                                </form>
                            </td>
                        </tr>`
            }).join('')  
            renderContent(content)

            if(Object.keys(likedQuizzes).length === 0)
            {
                sectionToRender.innerHTML = `<div class="uk-flex justify-content-center">
                                                <figure style="height:200px;width:200px;"><img alt="" src="{{ asset('images/resources/find.png') }}"></figure>
                                            </div>
                                            <div class="text-center p-2">
                                                <h6>Nothing to show</h6>
                                                <p>You currently do not have liked quizzes</p>
                                            </div>`
                                
            }
    }

    function sharedWithMe()
    {
        let sharedQuizzes = {!! json_encode($shared_quizzes) !!}
        let content =   sharedQuizzes.map((q) => {
                return `<tr>
                            <td class="text-capitalize text-primary">
                                <a href="/quiz/${q.quiz.slug}">
                                    ${q.quiz.title}
                                </a>
                            </td>
                            <td>${q.quiz.subject.title}</td>
                            <td>${q.quiz.views}</td>
                            <td>${formatDate(q.created_at)}</td>
                            <td class='uk-flex flex-row'>
                                <button type="sumit" class="button small soft-primary mx-2"><i class="icofont-pen-alt-1"></i></button>
                                <form action="" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="sumit" class="button small soft-danger" onclick='return confirm("Are you sure you want to delete this question?")'><i class="icofont-trash"></i></button>
                                </form>
                            </td>
                        </tr>`
            }).join('')  
            renderContent(content)
        
            if(Object.keys(sharedQuizzes).length === 0)
            {
                sectionToRender.innerHTML = `<div class="uk-flex justify-content-center">
                                                <figure style="height:200px;width:200px;"><img alt="" src="{{ asset('images/resources/share2.svg') }}"></figure>
                                            </div>
                                            <div class="text-center p-2">
                                                <h6>Nothing to show</h6>
                                                <p>You currently do not have shared quizzes</p>
                                            </div>`
                                
            }
    }


</script>