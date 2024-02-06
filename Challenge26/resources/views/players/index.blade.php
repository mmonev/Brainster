<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <p class="py-2">{{ __("Players") }}</p>
                    <a href="{{route('players.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Player</a>
                </div>
            </div>
 
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Date of Birth</th>
                                <th class="px-4 py-2">Team</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                            <tr>
                                <td class="border px-4 py-2">{{$player->name . ' ' . $player->surname}}</td>
                                <td class="border px-4 py-2">{{$player->dob}}</td>
                                <td class="border px-4 py-2">{{$player->team->name}}</td>
                                <td class="border px-4 py-2 flex justify-around">
                                    <a href="{{route('players.edit', $player)}}" class="text-green-600">Edit</a>
                                    <a href="{{route('players.show', $player)}}" class="text-yellow-600">View</a>

                                    <form action="{{route('players.destroy', $player)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="player" value="{{$player->id}}">
                                        <button class="text-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
