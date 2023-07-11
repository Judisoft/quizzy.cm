@include('layouts.frontend.header')
<section>
	<div class="gap no-bottom help-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="search-section">
						<h1>How can we help you?</h1>
						<form method="post">
							<input type="text" placeholder="Describe Your Issue">
							<button><i class="icofont-search"></i></button>
						</form>
						<p>
							Popular searches: 
							<a href="#" title="">Create a Quiz</a>
							<a href="#" title="">Social Studies</a>
							<a href="#" title="">View Quiz analysis</a>
							<a href="#" title="">Memes</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		{{-- <figure class="bottom-image"><img src="images/bg-4.png" alt=""></figure> --}}
	</div>
</section>
<section>
	<div class="gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="search-sub">
						<a href="#">
							<figure><img src="images/resources/get-started.png" alt=""></figure>
							<h1>Get Started</h1>
							<p class="p-3">Welcome to Quizzy! Let's start creating, teleporting and sharing quizzes</p>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="search-sub">
						<a href="#">
							<figure><img src="images/resources/technical-info.png" alt=""></figure>
							<h1 class="pt-5">Technical Information</h1>
							<p class="p-3">For all technical related issues, please do contact our technical team.</p>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="search-sub">
						<a href="#">
							<figure><img src="images/resources/account-details.png" alt=""></figure>
							<h1 class="pt-4">Account Details</h1>
							<p class="p-3">Manage your account with ease. You can modify your account details at as you wish</p>
						</a>
					</div>
				</div>                      
			</div>
			<div class="row mt-3">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="search-sub">
						<a href="#">
							<figure><img src="images/resources/security.png" alt=""></figure>
							<h1>Safety, Privacy, Accessibility & Inclusion</h1>
							<p class="p-3">How Quizzy Protects student Data, Privacy principles, Read accessibility and inclusion statement</p>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="search-sub">
						<a href="#">
							<figure><img src="images/resources/contact-us.png" alt=""></figure>
							<h1 class="pt-2">Contact Us</h1>
							<p class="p-3">Report Inappropriat Content, Help with Translations, Quizzy for Work, Troubleshooting </p>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="search-sub">
						<a href="#">
							<figure><img src="images/resources/faqs.png" alt=""></figure>
							<h1 class="pt-4">FAQs</h1>
							<p class="p-3">Get answers to specific questions here. Scroll through to find questions and answers</p>
						</a>
					</div>
				</div>                      
			</div>
		</div> 
		{{-- <figure class="bottom-image"><img src="images/bg-4.png" alt=""></figure> --}}
	</div>
</section>
@include('layouts.frontend.footer')
<script src="js/main.min.js"></script>
<script src="js/script.js"></script>
</body>	
</html>