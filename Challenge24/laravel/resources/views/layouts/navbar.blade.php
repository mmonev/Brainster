<nav class="navbar navbar-expand-lg navbar-light bg-warning justify-content-center px-5">
    <div class="d-lg-flex justify-content-center">

        <a class="navbar-brand me-5" href="/">
        <img class="img-fluid nav-logo" src="{{ asset('/images/Brainster-Logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav container align-items-center text-center">

                <li class="nav-item col">
                    <a class="nav-link" aria-current="page" href="https://brainster.co/full-stack/"
                        target="_blank">Академија за Програмирање</a>
                </li>
                <li class="nav-item  col">
                    <a class="nav-link"
                        href="https://marketpreneurs.brainster.co/?gclid=CjwKCAjwlYCHBhAQEiwA4K21m-OnAHdWZ14i2mqYyOupx-u9ILNMa6qILKDIWM6C13i26ncoFuVSChoC0aoQAvD_BwE"
                        target="_blank">Академија за Маркетинг</a>
                </li>
                <li class="nav-item  col">
                    <a class="nav-link" href="https://brainster.co/graphic-design/" target="_blank">Академија за
                        Дизајн</a>
                </li>
                </li>
                <li class="nav-item  col">
                    <a class="nav-link" href="https://blog.brainster.co/" target="_blank">Блог</a>
                </li>
                </li>

                {{-- Display log in or dashbord button --}}
                @auth
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link  col">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link  col">Log out</a>
                </li>
                @else
                <li class="nav-item  col">
                    <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#employmentForm">Вработи Наши
                        студенти</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link  col btn btn-danger">Најави се</a>
                </li>
                @endauth


            </ul>
        </div>
    </div>

</nav>

<!-- Modal -->
<div class="modal fade" id="employmentForm" tabindex="-1" aria-labelledby="employmentFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вработи Наши студенти</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Внесете ваши информации за да стапиме во контакт.</p>
                <form action={{ route('employee') }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="company_email" class="form-label text-left">E-маил</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            id="company_email" aria-describedby="emailHelp">
                        @error('email')
                        <p class="alert alert-danger p-0">{{ $message }}</p>

                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" id="phone">
                        @error('phone')
                        <p class="alert alert-danger p-0">{{ $message }}</p>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Компанија</label>
                        <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}"
                            id="company_name">
                        @error('company_name')
                        <p class="alert alert-danger p-0">{{ $message }}</p>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-warning form-control">Испрати</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>