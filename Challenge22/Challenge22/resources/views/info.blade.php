@extends('template.master')

@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-6">
            <h4 class="text-white">Your name is : {{ $userInfo['name'] }}</h4>
            <h4 class="text-white">Your last name is : {{ $userInfo['lastname'] }} </h4>
            @isset($userInfo['email'])
            <h4 class="text-white">Your email is: {{ $userInfo['email'] }}</h4>

            @endisset
        </div>
    </div>
</div>
@endsection