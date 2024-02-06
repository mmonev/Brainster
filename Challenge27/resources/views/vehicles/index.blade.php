@extends('layouts.main')

@section('content')

    
<div class="relative overflow-x-auto pt-10 pb-10">
    <div class="ml-auto text-right mb-5">
        <a class="rounded-md bg-slate-800 text-white border border-1 hover:bg-slate-600 hover:text-white p-3 " href="{{ route('vehicles.create') }}">Add new vehicle</a>
    </div>
    <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Brand
                </th>
                <th scope="col" class="px-6 py-3">
                    Model
                </th> 
                <th scope="col" class="px-6 py-3">
                    Plate number
                </th>
                <th scope="col" class="px-6 py-3">
                    Insurance date
                </th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
            $.get("/api/vehicles",
                function (data, textStatus, jqXHR) {
                    fillTable(data)
                }
            );

            function fillTable(vehicles) {
                let tbody = ''

                $.each(vehicles, function (index, vehicle) { 
                    let actionButtons = '' 
                        actionButtons = `
                        <a href='/vehicles/${vehicle.id}/edit' class='text-blue-600 mx-2'>Edit</a>
                        <button data-id='${vehicle.id}' class='text-red-600 mx-2 delete'>Delete</button>
                        `

                     tbody += `
                     <tr id='${vehicle.id}' class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">${vehicle.brand}</td>
                        <td class="px-6 py-4">${vehicle.model}</td>
                        <td class="px-6 py-4">${vehicle.plate_number}</td>
                        <td class="px-6 py-4">${vehicle.insurance_date}</td>
                        <td class="px-6 py-4">${actionButtons}</td>
                     </td>
                     `
                });

                $('tbody').html(tbody)
            }

            $(document).on('click', '.delete', function () {
                let id = $(this).data('id')
                
                $.ajax({
                    type: "DELETE",
                    url: "/api/vehicles/" + id,
                    success: function (response) {
                        $.get("/api/vehicles",
                function (data, textStatus, jqXHR) {
                    fillTable(data)
                }
            );
                    }
                });
            });

        });

</script>
@endsection