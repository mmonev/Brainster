@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Додај</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="projects/all">Измени</a>
                </li>
            </ul>
        </div>
        <div class="col-12">
            @if (Session::has('success'))
            <p class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>

            @endif
            @if ($errors->all())
            <ul class="alert alert-danger" role="alert">
                <div class="ps-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
            </ul>
            @endif
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 align-content-stretch justify-content-center flex-wrap  gx-3 gy-5 my-2">
        @foreach ($projects as $project)
        <div class="col">
            <div class="card pt-2">
                <div class="edit-card">
                    <div class="w-50 mx-auto">
                        <img src="{{ $project->image }}" class="img-fluid" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">{{ $project->name }}</h5>
                        <p class="card-text text-muted fw-light">{{ $project->subtitle }}</p>
                        <p class="card-text">{{ Str::words($project->description , 15) }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-evenly">

                            <button type="button" class="delete-project btn btn-default" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $project->id }}"><i
                                    class="fas fa-times fa-2x"></i></button>
                            <button class="edit-project-btn btn"><i class="fas fa-edit fa-2x"></i></button>
                        </div>
                    </div>
                </div>
                <div class="edit-project-form">
                    <form class="px-3" action={{ route('update.project' , [$project->id ]) }} method='POST'>
                        @csrf
                        <div class="form-group">
                            <label for="project-name">Име</label>
                            <input type="text" name="name" class="form-control" value="{{ $project->name }}"
                                id="project-name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="product-subtitle">Поднаслов</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $project->subtitle }}"
                                id="product-subtitle" aria-describedby="product-subtitle-help">
                        </div>
                        <div class="form-group">
                            <label for="image">Слика</label>
                            <input type="url" name="image" class="form-control" id="image" value="{{ $project->image }}"
                                aria-describedby="imageHelp" placeholder="http://">
                        </div>
                        <div class="form-group">
                            <label for="project-link">URL</label>
                            <input type="url" name="link" class="form-control" id="project-link"
                                value="{{ $project->link }}" aria-describedby="project-link-help" placeholder="http://">
                        </div>
                        <div class="form-group">
                            <label for="project-description">Опис</label>
                            <textarea name="description" class="form-control" id="project-descripion"
                                rows="5">{{ $project->description }}</textarea>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary form-control">Додади</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Избриши</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> - </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Откажи</button>
                        <form action={{ route('delete.project' , [ $project->id]) }} method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-warning">Избриши</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection