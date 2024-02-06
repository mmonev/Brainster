<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <p class="py-2">{{ __("Add new Match") }}</p>
                    <a href="{{route('matches.index')}}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 flex justify-between content-center">
 
                    <form method="POST" action="{{route('matches.store')}}" class="w-full">
                        @csrf
                        <div class="mb-6">
                            <label for="home_team" class="block mb-3 text-sm font-medium text-gray-900">Home
                                Team</label>
                            <select id="home_team" name="home_team"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled>Choose a team</option>
                                @foreach ($teams as $team)
                                <option value="{{$team->id}}" @if (old('home_team') == $team->id)
                                    selected
                                @endif>{{$team->name}}</option>
                                @endforeach
                            </select>
                            @error('home_team')
                            <div class="p-3 mb-3 text-sm text-red-800"
                                role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="away_team" class="block mb-3 text-sm font-medium text-gray-900">Away
                                Team</label>
                            <select id="away_team" name="away_team"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled>Choose a team</option>
                                @foreach ($teams as $team)
                                <option value="{{$team->id}}" @if (old('away_team') == $team->id)
                                    selected
                                @endif>{{$team->name}}</option>
                                @endforeach
                            </select>
                            @error('away_team')
                            <div class="p-3 mb-3 text-sm text-red-800"
                                role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="game_date" class="block mb-3 text-sm font-medium text-gray-900">Date</label>
                            <input type="date" id="game_date" name="game_date" value="{{old('game_date')}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('game_date')
                            <div class="p-3 mb-3 text-sm text-red-800"
                                role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>