@extends('layouts.main')

@section('content')
@if ($errors->any())
<div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Danger</span>
    <div>
      <span class="font-medium">Ensure that these requirements are met:</span>
        <ul class="mt-1.5 ml-4 list-disc list-inside">
            @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
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

    <h2 class="text-2xl w-2/3 mx-auto mt-8">Edit comment:</h2>

    <div class="w-2/3 h-full mx-auto mt-10 pb-10">
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment</label>
                <input type="text" id="comment" name="comment" value="{{ $comment->comment }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Title of discussion">
            </div>
           
            <input type="hidden" value="{{ Auth::user()->id }}" name="userId">

            <button type="submit" formaction="{{ route('comments.update', $comment->id) }}"
                class="mt-8 mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update comment</button>
        </form>

    </div>
@endsection
