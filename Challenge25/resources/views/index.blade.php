@extends('layouts.main')

@section('content')
<a href="{{ route('login') }}" class="font-medium text-dark-600 dark:text-dark-500 text-xl ml-2">Log in to create a topic</a>
    <div class="flex flex-col mt-2">
        @if (count($discussions) == 0)
        <h2 class="text-center text-2xl p-3 mt-4">Nothing yet! Start a topic!</h2>
            
        @else
        @foreach ($discussions as $discussion)
            <a href="{{ route('home.show', $discussion->id) }}" class="flex flex-row justify-between content-center my-6 p-10 bg-white border-2 border-slate-200 hover:bg-slate-300">
                <div class="mr-5 text-left">
                    <img class="h-16" src="{{ $discussion->picture }}" alt="">
                </div>
                <div class="mr-auto text-left">
                    <h4 class="text-2xl font-normal mb-3">{{ $discussion->title }}</h4>
                    <p>{{ $discussion->description }}</p>
                </div>
                <div class="pt-5 text-right">
                    <h4 class="inline font-light">{{ $discussion->category->name }}</h4>
                    <p class="inline"> | </p>
                    <h4 class="inline font-light">{{ $discussion->user->username }}</h4>
                </div>
            </a>
        @endforeach 
        @endif 
    </div>
@endsection
