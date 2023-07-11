@include('layouts.frontend.header')
<style>
	.img-sm {
		height: 50px;
		width: 50px;
	}
	.contact-details {
		display: flex;
		flex-direction: row;

	}
</style>
<section>
	<div class="gap mt-4">
		<div class="container">
			<div class="row remove-ext30  mb-5" style="border-radius:5px;">
				<div class="col-lg-6 col-md-6 col-sm-6" data-aos="slide-up">
					<div class="mb-5"><h1 class="text-center" style="font-weight:700;">Contact Us @ <span style="color:#4267B2">Quizzy</span></h1></div>
					<div class="card-body border-plan br-10 shadow-index">
						<div class="recommended mb-3">
							<h6 class="text-light">Fill the form below and we'll respond to you as soon as we get your message</h6>
						</div>
						@if(Session::has('success'))
							<p class="alert alert-info"><i class="icofont-check-circled"></i> {{ Session('success') }}</p>
						@endif
						@if(Session::has('error'))
							<p class="alert alert-danger"><i class="icofont-close-circled"></i> {{ Session('error') }}</p>
						@endif
						<form action="{{ route('post-contact') }}" method="POST" class="contact-form">
							@csrf
							<div class="uk-margin p-2">
								<input class="uk-input" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
								<p><small class="text-danger text-center">@if($errors->has('name')) {{ $errors->first('name') }} @endif</small></p>
							</div>
							<div class="uk-margin p-2">
								<input class="uk-input" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
								<p><small class="text-danger text-center">@if($errors->has('email')) {{ $errors->first('email') }} @endif</small></p>
							</div>
							<div class="uk-margin p-2">
								<input class="uk-input" type="text" placeholder="Institution" name="institution" value="{{ old('institution') }}">
								<p><small class="text-danger text-center">@if($errors->has('institutiion')) {{ $errors->first('institution') }} @endif</small></p>
							</div>
							<div class="uk-margin p-2">
								<select class="uk-select" name="role">
									<option value="">-- select role --</option>
									<option value="student">Student</option>
									<option value="teacher">Teacher</option>
									<option value="school admin">Administrator</option>
									<option name="regional/regional admin">Regional/District Administrator</option>
								</select>
								<p><small class="text-danger text-center">@if($errors->has('role')) {{ $errors->first('role') }} @endif</small></p>
							</div>
							<div class="uk-margin p-2">
								<textarea class="uk-textarea" rows="5" placeholder="Enter Message" name="message" value="{{ old('message') }}"></textarea>
								<p><small class="text-danger text-center">@if($errors->has('message')) {{ $errors->first('message') }} @endif</small></p>
							</div>
							<div class="uk-margin p-2 align-center">
								<button type="submit" class="btn btn-plan btn-block py-3">Send Message</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 mt-5" data-aos="fade-left">
					{{-- <figure><img alt="" src="images/resources/message.gif"></figure> --}}
				</div>
				<div class="col-lg-5 col-md-5 col-sm-5" data-aos="fade-right">
					<h1 class="" style="font-weight:700;">We are happy to serve you!</h1>
					<div class="contact-details mt-5">
						<figure><img alt="" src="images/resources/letter.png" class="img-sm"></figure>
						<h5>info@quizzy.cm</h5>
					</div>
					<div class="contact-details mt-5">
						<figure><img alt="" src="images/resources/telephone-receiver.png" class="img-sm"></figure>
						<h5>(+237) 672-076-995</h5>
					</div>
					<div class="contact-details mt-5">
						<figure><img alt="" src="images/resources/distance.png" class="img-sm"></figure>
						<h5>Simbock, Yaounde</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('layouts.frontend.footer')
<script src="js/main.min.js"></script>
<script src="js/script.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>	
</html>