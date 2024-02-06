<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <p class="py-2">{{ __("Matches") }}</p>
                    @if (Auth::user()->role->name == 'Admin')
                    <a href="{{route('matches.create')}}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Match</a>
                    @endif
                </div>
            </div>
 
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <table class="table-auto w-full text-center">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Home Team</th>
                                <th class="px-4 py-2">Away Team</th>
                                <th class="px-4 py-2">Result</th>
                                @if (Auth::user()->role->name == 'Admin')
                                <th class="px-4 py-2">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matches as $match)
                            <tr>
                                <td class="border px-4 py-2">{{$match->homeTeam->name}}</td>
                                <td class="border px-4 py-2">{{$match->awayTeam->name}}</td>
                                <td class="border px-4 py-2">{{$match->home_team_goals . ':' . $match->away_team_goals}}
                                </td>
                                @if (Auth::user()->role->name == 'Admin')
                                <td class="border px-4 py-2 flex justify-around">
                                    <a href="{{route('matches.edit', $match)}}" class="text-green-600">Edit</a>

                                    <form action="{{route('matches.destroy', $match)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="match" value="{{$match->id}}">
                                        <button class="text-red-600">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>