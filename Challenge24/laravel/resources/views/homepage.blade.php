@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 align-content-stretch justify-content-center flex-wrap  gx-3 gy-5 my-2">
        @foreach ($projects as $project)
        <div class="col">
            <a class="text-decoration-none" href="{{ $project->link }}">
                <div class="card hompage-project-card pt-2">
                    <div class="w-50 mx-auto">
                        <img src="{{ $project->image }}" class="img-fluid" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">{{ $project->name }}</h5>
                        <p class="card-text text-muted fw-light">{{ $project->subtitle }}</p>
                        <p class="card-text text-dark">{{ Str::words($project->description , 15) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>

</div>

@endsection