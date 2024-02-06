@extends('template.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7 mx-auto text-light">
            <form class="form-flex" action="{{route('validate')}}" method="POST">
                @csrf

                <div class="row mb-3">
                    @error('name')
                    <div class="col-sm-12 bg-danger">
                        <p class="text-light m-0">
                            {{$message}}
                        </p>
                    </div>
                    @enderror
                    
                    <label for="name" class="col-sm-12 col-form-label">NAME</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    @error('lastname')
                    <div class="col-sm-12 bg-danger">
                        <p class="text-light m-0">
                            {{$message}}
                        </p>
                    </div>
                    @enderror
                    <label for="last-name" class="col-sm-12 col-form-label">LAST NAME</label>
                    <div class="col-sm-12">
                        <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" id="lastname">
                    </div>
                </div>
                <div class="row mb-3">
                    @error('email')
                    <div class="col-sm-12 bg-danger">
                        <p class="text-light m-0">
                            {{$message}}
                        </p>
                    </div>
                    @enderror
                    <label for="email" class="col-sm-12 col-form-label">EMAIL</label>
                    <div class="col-sm-12">
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}"  id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="com-sm-12">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection