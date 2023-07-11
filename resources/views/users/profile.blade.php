@include('layouts.dashboard.main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h2 class="main-title fw-700">Contact {{ $user->name }} </h2>
                <div class="row mb-4">
                    <div class="col-lg-6 mb-4">
                        <div class="rounded bg-secondary text-center p-3">
                            <div class="user-avatar-edit">
                                <img src="{{ $user->profile_photo_url }}" alt="" style="height:200px;width:200px;border-radius:50%;">
                                <div class="fileupload">
                                    <span class="btn-text">@if($user_level) Level: {{ $user_level }} @endif</span>
                                    <input type="file" class="upload">
                                </div>
                            </div>
                            <div class="user-dp-edit pt-5 pb-3">
                                <div class="pt-3">
                                    <h4 class="fw-700">Name: {{ $user->name }} </h4>
                                </div>
                            </div>
                            <a class="button small success" href="tel:{{ $user->telephone }}" title=""><i class="icofont-ui-call"></i>  Call </a>
                            <a class="button small primary" href="mailto:{{ $user->email }}" title=""><i class="icofont-email"></i> Email</a>
                        </div>	
                    </div>
                    <div class="col-lg-6">
                        <div class="d-widget pl-4 text-center">
                            <div class="d-widget-title bg-light"><h4>Social Media Handles</h4></div>
                            <div class="social-links">
                                @if($user->facebook)
                                    <a href="https://facebook.com/{{ str_replace(' ','',$user->facebook) }}" class="button small primary circle" target="_blank"> <i class="icofont-facebook"></i> {{ $user->facebook }}</a>
                                @endif
                            </div>
                            <div class="social-links">
                                @if($user->facebook)
                                    <a href="https://instagram.com/{{ str_replace(' ','',$user->instagram) }}" class="button small soft-danger circle" target="_blank"><i class="icofont-instagram"></i> {{ $user->instagram }}</a>
                                @endif
                            </div>
                            <div class="social-links">
                                @if($user->facebook)
                                    <a href="https://twitter.com/{{ str_replace(' ','',$user->twitter) }}" class="button small info circle" target="_blank"><i class="icofont-twitter"></i> {{ $user->twitter }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
</div>