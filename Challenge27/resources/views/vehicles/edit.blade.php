@extends('layouts.main')

@section('content')
    <div id="messages" class="text-red-600 text-center text-xl"></div>
    <div id="success" class="text-green-600 text-center text-xl"></div>

    <div class="w-2/3 mx-auto mt-10 mb-5">
        <p class="py-5 text-xl italic">Edit vehicle:</p>
    </div>
<form class="w-2/3 mx-auto pb-5">
    <div class="mb-6">
      <label for="brand" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Brand</label>
      <input type="text" id="brand" name="brand" value="{{$vehicle->brand}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    </div>
    <div class="mb-6">
      <label for="model" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Model</label>
      <input type="text" id="model" name="model"  value="{{$vehicle->model}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    </div> 
    <div class="mb-6">
      <label for="plate_number" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Plate number</label>
      <input type="text" id="plate_number" name="plate_number"  value="{{$vehicle->plate_number}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    </div>
    <div class="mb-6">
      <label for="insurance_date" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Insurance date</label>
      <input type="date" id="insurance_date" name="insurance_date"  value="{{$vehicle->insurance_date}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
  
  <script>
    $(document).ready(function() {
        $('form').on('submit', function (e) {
            e.preventDefault();

            let data = {
                'brand': $('#brand').val(),
                'model': $('#model').val(),
                'plate_number': $('#plate_number').val(),
                'insurance_date': $('#insurance_date').val(),
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            }

            $.ajax({
                    type: "PUT",
                    url: "/api/vehicles/{{$vehicle->id}}",
                    data: data,
                    success: function (response) {
                      $('#success').text(response)
                      setTimeout(function(){
                        document.location = '/vehicles'
                      }, 1200);
                      
                    },
                    error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function () {
                        $('#messages').text(errors.message);
                    });
                    }
                });


        });
    });
</script>

@endsection