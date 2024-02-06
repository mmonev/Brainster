@extends('layouts.main')

@section('content')
    <div class="flex flex-col mt-2">
        <div class="flex flex-col justify-between content-center my-6 p-10 bg-white border-2 border-slate-200">
            <div class="ml-auto">
                <h4 class="inline font-light">{{ $discussion->category->name }}</h4>
                <p class="inline"> | </p>
                <h4 class="inline font-light">{{ $discussion->user->username }}</h4>
            </div>
            <div class="mx-auto mt-6">
                <img class="h-96" src="{{ $discussion->picture }}" alt="">
            </div>
            <div class="w-2/3 mx-auto mt-10 text-center">
                <h4 class="text-2xl font-normal mb-2">{{ $discussion->title }}</h4>
                <p>{{ $discussion->description }}</p>
            </div>
        </div>
    </div>
 
    <div class="p-3">
        <h3 class="text-2xl">Comments:</h3>
        @foreach ($discussion->comment as $comment )
        <div class="flex flex-col my-2 p-3 bg-white border border-2 border-slate-200">
           <div class="flex flex-row justify-between content-center py-1">
                   <p class="font-semibold">{{ $comment->user->username }} says:</p>
                   <p class="font-light text-slate-500">{{ $comment->created_at }}</p>
           </div>
           <div class="flex flex-row justify-between content-center py-1">
                   <p>{{ $comment->comment }}</p>           
           </div>
       </div>
       @endforeach
    </div>
    <div class="my-5 mb-9">
        <a href="{{ route('login') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-xl ml-2">Log in to comment</a>
    </div>
@endsection
