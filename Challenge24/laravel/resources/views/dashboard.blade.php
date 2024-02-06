@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link  active" href="#">Додај</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('show.projects') }}">Измени</a>
                </li>
            </ul>
        </div>
        <div class="col-12">
            <p class="fs-3">Додај нов Проект:</p>
        </div>
        <div class="col-12 col-md-8 mx-auto">

            <form action="{{ route('store.project')}}" method="POST">
                @csrf
                @if (Session::has('success'))
                <p class="alert alert-success alert-dismissible fade show">{{ Session::get('success') }} <button
                        type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
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


                <div class="form-group">
                    <label for="project-name">Име</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="project-name"
                        aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="product-subtitle">Поднаслов</label>
                    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}"
                        id="product-subtitle" aria-describedby="product-subtitle-help">

                </div>
                <div class="form-group">
                    <label for="image">Слика</label>
                    <input type="url" name="image" class="form-control" id="image" value="{{ old('image') }}"
                        aria-describedby="imageHelp" placeholder="http://">

                </div>
                <div class="form-group">
                    <label for="project-link">URL</label>
                    <input type="url" name="link" class="form-control" id="project-link" value="{{ old('link') }}"
                        aria-describedby="project-link-help" placeholder="http://">

                </div>
                <div class="form-group">
                    <label for="project-description">Опис</label>
                    <textarea name="description" class="form-control" id="project-descripion"
                        rows="5">{{ old('description') }}</textarea>

                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-warning form-control">Додади</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection