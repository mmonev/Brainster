{{-- include bootstrap bundle --}}
<script src="{{ asset('js/app.js') }}"></script>
{{-- Jquery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- Edit projects stricpt --}}
@if (Route::is('show.projects'))
<script src="{{ asset('js/edit-projects.js') }}"></script>
@endif



@if (Route::is('homepage') && Session::has('success'))
@php
$message = Session::get('success');
@endphp
<script>
    alert(' {{ $message }} ')
</script>
@endif

@if (Route::is('homepage') && $errors->all())
{{-- doesnt read included bootstrap in this case  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    $(function () {
      
    let myModal = new bootstrap.Modal($('#employmentForm'), {
    keyboard: false
    })
    
    myModal.show()  
    })
</script>

@endif