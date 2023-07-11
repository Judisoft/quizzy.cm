@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h4 class="main-title">My Teams</h4>
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="row merged20mt-5 mb-4">
                        <div class="col-lg-3">                           
                            @forelse(Auth::user()->allTeams() as $team)
                                <div class="d-widget-title mb-4">
                                    <a href="{{ url('/my-teams/team-details/'.$team->id) }}" style="color:#008dcd;">
                                        {{ $team->name }}
                                        @if(Auth::user()->ownsTeam($team))
                                            <small class="text-secondary">[{{ $team->users->count() }}]</small>
                                        @endif
                                    </a>
                                </div>
                            @empty
                                <p>No team</p>
                            @endforelse
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <a href="{{ route('teams.create') }}"><button class="button small primary">Create New Team</button></a>
                            @endcan
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="d-widget mt-4">
                                <div class="d-widget-title">
                                    <h5>Team Invitations</h5>
                                </div>
                                <table class="table-default manage-user table table-striped table-responsive-md">
                                    @if (count($invitations) > 0)
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Team Name</th>
                                                <th>Role</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                    @endif
                                    <tbody>
                                        @forelse ($invitations as $invitation)
                                            <tr>
                                                <td>{{ $invitation->email }}</td>
                                                <td>{{$invitation->team->name  }}</td>
                                                <td>
                                                {{ $invitation->role }}
                                                </td>
                                                <td>{{ $invitation->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @empty
                                            <p class="text-center">You have no team invitations</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div><!-- main content -->