<!DOCTYPE html>
<html>

<head>
    <title>Forum</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    @include('partials.links')
</head>

<body>
    @include('partials.nav')
<div class="w-full h-full bg-slate-50 border-t-4 border-t-slate-100">
    <div class="w-2/3 mx-auto">
        <h1 class="text-4xl text-center pt-7 mb-14">Brainster Forum</h1>
        @yield('content')
    </div>
</div>

    @include('partials.scripts')
</body> 

</html>
