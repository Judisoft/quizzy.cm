@include('layouts.dashboard.main')
<div class="row">
    <div class="col-lg-12">
        <div class="panel-content">
            <h4 class="main-title"> Hi {{ $user->name }}, Your profile is almost complete!</h4>
            <div class="row mb-4">
                <div class="col-lg-4">
                    <div class="rounded bg-secondary text-center p-3">
                        <div class="user-avatar-edit">
                            <img src="{{ $user->profile_photo_url }}" alt="" style="height:200px;width:200px;border-radius:50%;">
                            <div class="fileupload">
                                <span class="btn-text">Level {{ $user->level }}</span>
                                <input type="file" class="upload">
                            </div>
                        </div>
                        <div class="user-dp-edit pt-5 pb-3">
                            <div class="pt-3">
                                <h4 class="fw-700">{{ $user->name }} </h4>
                            </div>
                        </div>
                    </div>	
                </div>
                <div class="col-lg-7">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="rounded" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p class="text-danger">{{ $error }}</p>
                        </div>
                        @endforeach
                    @endif
                    
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="d-widget pl-4">
                            <div class="d-widget-title"><h5>We need more information to serve you better</h5></div>
                            <div class="uk-margin social-links">
                                Telephone<span class="text-danger">*</span>
                                <input type="text" class="uk-input" placeholder="Telephone (Preferrably Whatsapp)" name="telephone" value="{{ old('telephone') }}">
                                @if ($errors->has('telephone')) <em class="text-danger">{{ $errors->first('name') }}</em> @endif
                            </div>
                            <div class="uk-margin social-links">
                                Institution<span class="text-danger">*</span>
                                <input type="text" class="uk-input" placeholder="Institution or Name of Preparatory Centre" name="institution" value="{{ old('institution') }}">
                                @if ($errors->has('institution')) <em class="text-danger">{{ $errors->first('name') }}</em> @endif
                            </div>
                            <div class="social-links uk-margin">
                                Level<span class="text-danger">*</span>
                                <select class="uk-select" name="level">
                                    <option value="">-- select a level --</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}" @if(old('level') == $level->id) selected="selected" @endif>{{ $level->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level')) <em class="text-danger">{{ $errors->first('name') }}</em> @endif
                            </div>
                        </div>
                        <div class="d-widget pl-4 mt-4">
                            <div class="d-widget-title"><h5>Bio</h5></div> 
                            <div class="uk-margin social-links">
                                <textarea class="uk-textarea" rows="5" placeholder="Tell us something about yourself" name="bio" style="height:200px;">{{ old('bio') }}</textarea>
                                @if ($errors->has('bio')) <em class="text-danger">{{ $errors->first('name') }}</em> @endif
                                <em>We're excited to know you. Write a brief bio about yourself</em>
                            </div>
                        </div>
                        <div class="d-widget pl-4 mt-4">
                            <div class="d-widget-title"><h5>Social Links</h5></div>
                            <div class="uk-margin social-links">
                                <i class="icofont-facebook"></i>
                                <input type="text" class="uk-input" placeholder="Facebook Profile" name="facebook" value="{{ old('facebook') }}">
                                <em>Add your Facebook username (e.g. johndoe).</em>
                            </div>
                            <div class="uk-margin social-links">
                                <i class="icofont-instagram"></i>
                                <input type="text" class="uk-input" placeholder="Instagram Profile" name="instagram" value="{{ old('instagram') }}">
                                <em>Add your Instagram username (e.g. johndoe).</em>
                            </div>
                            <div class="uk-margin social-links">
                                <i class="icofont-twitter"></i>
                                <input type="text" class="uk-input" placeholder="Twitter Profile" name="twitter" value="{{ old('twitter') }}">
                                <em>Add your Twitter username (e.g. johndoe).</em>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <button type="submit" class="button primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>	
        </div>
    </div>
</div>