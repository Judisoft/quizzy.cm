<x-app-layout>
    <div class="pt-4 bg-gray-200">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            {{-- <div>
                <x-jet-authentication-card-logo />
            </div> --}}

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-gray-100 shadow-sm overflow-hidden sm:rounded-lg prose">
                <h2 class="text-center font-bold">Leaderboard</h2>
                <div class="flex-auto justify-between">
                    <div class="flex-auto w-64">
                        <select id="weekId" onchange="getWeekId();" class="inline-flex items-center px-4 py-3 bg-gray-300 border border-transparent rounded-md font-semibold text-xs  uppercase tracking-widest transition" style="width:100%;">
                           <option value="{{ $current_week_id }}"> Week {{ $current_week_id }} </option>
                           @for($i=1; $i<$current_week_id; $i++)
                                <option value="{{ $i }}">Week {{  $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <table class="table-auto table-striped" id="table">
                    @if(count($user_scores) > 0)
                        <thead>
                            <tr class="font-bold uppercase">
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Score(%)</th>
                            <th>Date</th>
                            </tr>
                        </thead>
                    @endif
                    <tbody id="myTable">
                        @forelse ($user_scores as $key=>$rank)
                            <tr>
                                <td>{{ $key + 1}}</td>
                                <td><a href="{{ route('user.profile', $rank->user->id) }}">{{ $rank->user->name }}</td>
                                <td>{{ $rank->score }}</td>
                                <td>{{ $rank->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                        <p class="text-center border p-2">No data to show</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
        });
    </script>

    <script>
        function getWeekId() {
            let selectedWeekId = document.getElementById("weekId").value;
            let user_data = {
               week_id: selectedWeekId
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
               $.ajax({
                  url: '/weekly-challenge/leadersboard',
                  method: 'post',
                  data: user_data,
                  success: function(){
                    
                  }});
        }
    </script>
    
</x-app-layout>
