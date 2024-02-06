<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head-links')
    <title>Challenge-24</title>
</head>

<body class="position-relative">
    @include('layouts.navbar')


    @if (Request::is('/'))
    @include('layouts.header')
    @endif

    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
</body>

</html>