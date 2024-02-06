<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <p class="py-2">{{$team->name}}</p>
                    <p class="py-2">{{$team->founding_year}}</p>
                </div>
            </div>
 
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-1/2 mx-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Players</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->players as $player)
                            <tr>
                                <td class="border px-4 py-2">{{$player->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table-auto w-1/2 mx-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Home Matches</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->homeMatches as $match)
                            <tr>
                                <td class="border px-4 py-2">{{$match->homeTeam->name . '-' . $match->awayTeam->name . ' ' . $match->home_team_goals . ':' . $match->away_team_goals}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table-auto w-1/2 mx-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Away Matches</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->awayMatches as $match)
                            <tr>
                                <td class="border px-4 py-2">{{$match->homeTeam->name . '-' . $match->awayTeam->name . ' ' . $match->home_team_goals . ':' . $match->away_team_goals}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
