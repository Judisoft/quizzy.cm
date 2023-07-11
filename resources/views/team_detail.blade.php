@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="uk-flex justify-content-between">
                    <h4 class="main-title">{{ $team->name }} </h4>
                    <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="uk-text-primary">settings</a>
                </div>
                <div class="row merged-10">
                    @forelse ($team->users as $user)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team"> <img alt="" src="{{ $user->profile_photo_url }}">
                                <div class="team-info-sec">
                                    <div class="team-info">
                                    <h3><a title="" href="{{ route('user.profile', $user->id) }}">{{ $user->name }}</a></h3>
                                    <span>{{__('Role:').' '.$user->membership->role }}</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="p-2">
                        <p class="text-center">No members yet</p>
                        <a href="{{ route('teams.show', $team) }}"><button  class="button small button-primary">Add team members</a></button>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->