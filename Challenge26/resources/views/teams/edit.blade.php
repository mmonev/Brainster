<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between content-center">
                    <p class="py-2">{{ __("Add new Match") }}</p>
                    <a href="{{route('teams.index')}}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
            </div>
 
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 flex justify-between content-center">

                    <form method="POST" action="{{route('teams.update', $team)}}" class="w-full">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="name" class="block mb-3 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" id="name" name="name" value="{{old('name', $team->name)}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('name')
                            <div class="p-3 mb-3 text-sm text-red-800"
                                role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="founding_year" class="block mb-3 text-sm font-medium text-gray-900">Year Founded</label>
                            <input type="number" id="founding_year" name="founding_year" value="{{old('founding_year', $team->founding_year)}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('founding_year')
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