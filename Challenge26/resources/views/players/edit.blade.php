<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <p class="py-2">{{ __("Update Player") }}</p>
                    <a href="{{route('players.index')}}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 flex justify-between content-center">
 
                    <form method="POST" action="{{route('players.update', $player)}}" class="w-full">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="name" class="block mb-3 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" id="name" name="name" value="{{old('name', $player->name)}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('name')
                            <div class="p-3 mb-3 text-sm text-red-800"
                                role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="surname" class="block mb-3 text-sm font-medium text-gray-900">Surame</label>
                            <input type="text" id="surname" name="surname" value="{{old('surname', $player->surname)}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('surname')
                            <div class="p-3 mb-3 text-sm text-red-800"
                                role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="dob" class="block mb-3 text-sm font-medium text-gray-900">Date of Birth</label>
                            <input type="date" id="dob" name="dob" value="{{old('dob', $player->dob)}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('dob')
                            <div class="p-3 mb-3 text-sm text-red-800"
                                role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="team_id" class="block mb-3 text-sm font-medium text-gray-900">Team</label>
                            <select id="team_id" name="team_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled>Choose a team</option>
                                @foreach ($teams as $team)
                                <option value="{{$team->id}}" @if (old('team_id', $player->team_id) == $team->id)
                                    selected
                                @endif>{{$team->name}}</option>
                                @endforeach
                            </select>
                            @error('team_id')
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