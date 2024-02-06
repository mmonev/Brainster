@extends('layouts.main')
{{-- @dd($discussions) --}}
@section('content')
    @if (Session::has('success'))
        <div class="flex p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success!</span> {{ Session::get('success') }}
            </div>
        </div>
    @endif 
    @if (Session::has('error'))
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Error!</span> {{ Session::get('error') }}
            </div>
        </div>
    @endif
    <a href="{{ route('discussions.create') }}"
        class="text-white bg-gray-600 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 ml-4 mb-5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add
        new discussion</a>
        @if (Auth::user()->role->name == 'admin')
        <a href="{{ route('admin.index') }}"
        class="text-white bg-gray-600 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 ml-4 mb-5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">To admin page</a>
        @endif
   

        @if (count($discussions) == 0)
        <h2 class="text-center text-2xl p-3 mt-4">Nothing yet! Start a topic!</h2>
            
        @else

    @foreach ($discussions as $discussion)
        {{-- @if ($discussion->approved == 1) --}}
            <div
                class="w-full mx-auto flex flex-row justify-between content-center my-6 p-10 bg-white border-2 border-slate-200 ">
                <div class="mr-5">
                    <img class="h-16" src="{{ $discussion->picture }}" alt="">
                </div>
                <div class="mr-auto">
                    <h4 class="text-2xl font-normal mb-3">{{ $discussion->title }}</h4>
                    <p>{{ $discussion->description }}</p>
                </div>
                <div class="flex flex-col justify-center content-end">
                    <div class="my-2 text-right">
                        <a href="{{ route('discussions.show', $discussion->id) }}"
                            class="inline text-center font-semibold hover:bg-slate-600 hover:text-white p-1.5 outline outline-1 outline-offset-2 outline-slate-400 ml-auto">Read
                            topic</a>
                    </div>
                    <div class="my-2 text-right">
                        <h4 class="inline font-light">{{ $discussion->category->name }}</h4>
                        <p class="inline"> | </p>
                        <h4 class="inline font-light">{{ $discussion->user->username }}</h4>
                    </div>
                    @if (Auth::user()->id == $discussion->user->id)
                        <div class="text-right">
                            <a title="Edit" href="{{ route('discussions.edit', $discussion->id) }}" class="inline mx-2"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                            <a title="Delete" data-id="{{ $discussion->id }}" class="delete-btn inline mx-2 hover:cursor-pointer"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </div>
                    @endif
                </div>
        {{-- @endif --}}
        </div>
        <div data-id="{{ $discussion->id }}" tabindex="-1"
            class="modal-div fixed top-0 left-0 right-0 z-50 hidden p-4 pt-52 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full mx-auto my-auto max-w-md md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button data-id="{{ $discussion->id }}" type="button"
                        class="hide-modal-btn absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center bg-slate-700">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-white dark:text-gray-400">Are you sure you want to
                            delete this discussion?</h3>
                        <div class="flex flex-row mx-auto content-center justify-center">
                            <form action="{{ route('discussions.destroy', $discussion->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes,
                                    delete it</button>
                            </form>
                            <button data-id="{{ $discussion->id }}" type="button"
                                class="hide-modal-btn text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @endif
@endsection
