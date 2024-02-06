@extends('template.master')

@section('content')
<div class="container my-5">
    <div class="row postion-relative">
        <div class="col-4 top-50 end-50">
            <div class="front-div transperent-bg text-center p-3">
                <p class="fs-5">LOREM IPSUM</p>
                <p class="fs-4">LOREM IPSUM</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum dolore quam minus deserunt mollitia, qui quis laboriosam suscipit praesentium possimus nulla consequuntur quae laudantium eius saepe ad quasi, beatae eum. Quod assumenda omnis quos, reiciendis, enim culpa animi dolorum quasi similique magni illo? Error voluptatem nesciunt, impedit tempora omnis hic.</p>
                <button class="front-div-btn btn btn-warning text-white">Visit us today</button>
            </div>
        </div>
        <div class="col-8 my-5">
            <div class="container">
                <img class="img-fluid" src="{{ URL::asset('images/catalyst_cafe.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row bg-warning">
        <div class="col-8 mx-auto my-4">

            <div class="div-border transperent-bg text-center p-3">
                <p>OUR PROMISE</p>
                <p class="text-uppercase">To {{$fullName}} </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat error voluptatibus ex voluptates! Illo, veritatis! Asperiores, suscipit aliquid. Nisi qui quos alias. Facilis consectetur molestiae vel exercitationem magni odio numquam voluptas, dolorem ex animi non esse quisquam tempora vitae accusamus quaerat corrupti cum culpa? Eum eveniet tempore, natus ut voluptatum expedita, eius illo obcaecati ducimus alias fugiat iusto earum quo sit. Earum architecto modi ea numquam itaque. Rem doloribus nam quia reiciendis corporis iure magni. Placeat quas repellendus blanditiis explicabo veniam, sequi assumenda fugiat ipsum quaerat corporis id fuga aliquid reprehenderit perferendis corrupti magnam cupiditate esse, nesciunt cum tempore!</p>
            </div>
        </div>
    </div>
</div>

@endsection