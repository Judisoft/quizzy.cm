@include('layouts.frontend.header')
<style>
	.fw-700 {
		font-weight:700 !important;
	}
</style>
<section>
	<div class="gap mt-5 bg-light">
		<div class="container">
			<div class="row remove-ext30" style="border-radius:5px;">
				<div class="col-lg-12">
					<div class="title">
						<h2 class="fw-700">Quizzy for <span style="color:#4267B2;font-size:2.5rem;">Students</span></h2>
						<figure><img alt="" src="images/resources/underline.svg"></figure>
						<p>Everything you need to succeed as a student, Quizzes make<br /> concepts stick</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-right">
					<div class="card-body mt-3 br-10 shadow-index">
						<h5 class="text-center fw-700 text-secondary">Basic</h5><br>
						<h2 class="text-center fw-700">2000 F/Mo</h2><br />
						<p>Access over 600 interactive quizzes and proven skill assessments.</p>
						<a href="{{ route('payment','basic') }}" class="btn btn-outline-plan btn-block py-3">Subscribe <i class="icofont-rounded-right h4 float-right"></i></a>
						<hr>
						<h6 class="p-3 text-secondary">Everything Students get:</h6>
						<p><i class="icofont-check px-2 h3 text-main"></i> 1 month of access</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> New quizzes every week</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Early access to new quizzes</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Access to teams</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Access to progress tracker</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Compete Every week</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Access to quiz analysis</p>

					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" data-aos="slide-up">
					<div class="card-body border-plan br-10 shadow-index">
						<div class="recommended mb-3">MOST POPULAR</div>
						<h5 class="text-center fw-700 text-secondary">Ultimate</h5><br>
						<h2 class="text-center fw-700" style="color:#4267B2;">5000 F/Yr</h2><br />
						<p>Level up with one-on-one follow up and Personalized Quizzes, plus everything in our Basic subscription.</p>
						<hr>
						<a href="{{ route('payment','ultimate') }}" class="btn btn-plan btn-block py-3">Subscribe <i class="icofont-rounded-right h4 float-right"></i></a>
						<hr>
						<p><i class="icofont-check px-2 h3 text-main"></i> 4 months of access</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> One-on-one follow-up</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Answer Explanations</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Early access to new quizzes</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> New quizzes everyday</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Compete every week</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Compete every week</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-left">
					<div class="card-body mt-3 br-10 shadow-index">
						<h5 class="text-center fw-700 text-secondary">Ultimate Plus</h5><br>
						<h2 class="text-center fw-700">10,000 F/Yr</h2><br />
						<p>Access over 1,000 interactive quizzes, proven skill assessments and everything in our Ultimate subscription</p>
						<a href="{{ route('payment','ultimate-plus') }}" class="btn btn-outline-plan btn-block py-3">Subscribe <i class="icofont-rounded-right h4 float-right"></i></a>
						<hr>
						<p><i class="icofont-check px-2 h3 text-main"></i> 12 months of access</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> One-on-one follow-up</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Answer Explanations</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Early access to new quizzes</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> New quizzes everyday</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Compete every week</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Win prizes everyweek</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="gap mt-3">
		<div class="container">
			<div class="row remove-ext30" style="border-radius:5px;">
				<div class="col-lg-12">
					<div class="title">
						<h2 class="fw-700">Quizzy for <span style="color:#4267B2;font-size:2.5rem;"> Teachers and Schools</span></h2>
						<figure><img alt="" src="images/resources/underline.svg"></figure>
						<p>Everything you need to motivate every student, whether you <br /> manage a classroom or an entire district.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-right">
					<div class="card-body mt-3 br-10 shadow-index">
						<figure><img alt="" src="images/resources/individuals.svg"></figure>
						<h4>Individual</h4><br />
						<p>All the activities and creative tools teachers need to start motivating students.</p>
						<a href="{{ route('contact') }}" class="btn btn-outline-plan btn-block py-3">Sign up for free <i class="icofont-rounded-right h4 float-right"></i></a>
						<hr>
						<h6 class="p-3 text-secondary">Everything Teachers get:</h6>
						<p><i class="icofont-check px-2 h3 text-main"></i> Limited Activities</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Interactive Lessons</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Asynchronous Assignments</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Engaging Assessments</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" data-aos="slide-up">
					<div class="card-body border-plan br-10 shadow-index">
						<div class="recommended mb-3">RECOMMENDED</div>
						<figure><img alt="" src="images/resources/schools.svg"></figure>
						<h4>Schools</h4><br />
						<p>Unlimited access for every teacher to motivate every student, plus LMS integrations and standards tagging.</p>
						<a href="{{ route('contact') }}" class="btn btn-plan btn-block py-3">Get a Quote <i class="icofont-rounded-right h4 float-right"></i></a>
						<hr>
						<p><i class="icofont-check px-2 h3 text-main"></i> Unlimited Storage</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> All Question Types</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Answer Explanations</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> LMS Integrations to sync grades and class rosters</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Standards-Aligned Content and Reporting</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-left">
					<div class="card-body mt-3 br-10 shadow-index">
						<figure><img alt="" src="images/resources/district.svg"></figure>
						<h4>Districts</h4><br />
						<p>Sitewide tools and dedicated support for districts that need to improve collaboration and measure impact.</p>
						<a href="{{ route('contact') }}" class="btn btn-plan btn-block py-3">Get a Quote <i class="icofont-rounded-right h4 float-right"></i></a>
						<hr>
						<h6 class="p-3 text-secondary">Everything for Schools, plus:</h6>
						<p><i class="icofont-check px-2 h3 text-main"></i> Rostering Integrations that keep everyone in sync</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> District-Level Sharing and Collaboration</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> District-Level User Management and Reporting</p>
						<p><i class="icofont-check px-2 h3 text-main"></i> Live Professional Development and Dedicated Success Manager</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('layouts.frontend.footer')	
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/main.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/counterup-t-waypoint.js"></script>
<script src="js/typed.js"></script>
<script src="js/script.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
	AOS.init();
</script>
</body>	
</html>