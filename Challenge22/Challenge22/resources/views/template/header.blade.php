<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    {{-- main css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <p class="py-5 text-center text-light fs-1">
                    BUSINESS CASUAL
                </p>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark nav-bg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-4" aria-current="page" href="/">HOME</a>
                    </li>

                    <li class="nav-item">
                        @if (Session::has('user'))
                        <a class="nav-link fs-4" href="logout">LOG OUT</a>
                        @else
                        <a class="nav-link fs-4" href="login">LOG IN</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>