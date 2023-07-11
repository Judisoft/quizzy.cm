
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Quizzy</title>
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
<div class="theme-layout">
	<div class="coming-page">
		<div id="container-inside">
		  	<div id="circle-small"></div>
		  	<div id="circle-medium"></div>
		  	<div id="circle-large"></div>
		  	<div id="circle-xlarge"></div>
		  	<div id="circle-xxlarge"></div>
		</div>
		<div class="comesoon-wraper">
				<div class="logo top-left"><img src="{{ asset('images/resources/quizzy-logo3.png') }}" alt=""><span></span></div>
				<div class="top-right">
					<a href="https://api.whatsapp.com/send?phone=237672076995" title="">Get In Touch</a>
				</div>
				<div class="come-soon mb-2">
					<h1>Coming Soon</h1>
					<span>WE ARE CURRENTLY UNDER CONSTRUCTION!</span>
					<p>
						Our Website will be up and running shortly. Thank you for stopping by. Sign up now to get early notification of our launch date!
					</p>
				</div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                       <div class="mb-3">
                            @if(Session::has('success'))
                                <div class="rounded" style="background-color: #bce0ef; border:1px solid #4267B2;" uk-alert>
                                    <a class="uk-alert-close" uk-close></a>
                                    <h6 class="pt-3 p-3 text-center" style="color:#4267B2;">{{ Session::get('success') }}</h6>
                                </div>
                            @endif
                       </div>
                        <div class="new-post mb-3">
                            <form action="{{ route('newsletter') }}" method="post">
                                @csrf
                                <i class="icofont-envelope"></i>
                                <input type="text" name="email" placeholder="Email e.g johndoe@email.com">
                            </form>
                        </div>
                        @if($errors->has('email'))<div class="bg-dark rounded p-3 mb-3" style="opacity:0.5;"><h6 class="text-center" style="color:red;"> Error:  {{ $errors->first('email') }} </h6></div>@endif
                    </div>
                </div>
				<div class="left-bottom">
					<span>launching in</span>
					<ul class="countdown">
						<li><span class="days">00</span><p class="days_ref">days</p></li>
						<li> <span class="hours">00</span><p class="hours_ref">hrs</p></li>
						<li> <span class="minutes">00</span><p class="minutes_ref">min</p></li>
						<li> <span class="seconds">00</span><p class="seconds_ref">sec</p></li>
					</ul>
				</div>
				<div class="right-bottom">
					<span>Follow Us</span>
					<ul>
						<li><a href="https://www.facebook.com/profile.php?id=100094536882634&mibextid=ZbWKwL" title="" target="_blank"><i class="icofont-facebook"></i></a></li>
						<li><a href="https://twitter.com/Quizzy_edu?t=n3aRy6tZOApd_22BxcLKWg&s=09" title="" target="_blank"><i class="icofont-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com/company/quizzyy/" title="" target="_blank"><i class="icofont-linkedin"></i></a></li>
						<li><a href="https://api.whatsapp.com/send?phone=237672076995" title="" target="_blank"><i class="icofont-whatsapp"></i></a></li>
					</ul>
				</div>
			</div>
	</div>	
</div>
	
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	

</body>	
</html>