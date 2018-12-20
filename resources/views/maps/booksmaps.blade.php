@extends('layouts.app')

@section('content')
        <!-- Fonts -->
    {!! $map['js'] !!}



    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">The Book Shelter</h1>
        <p class="lead font-weight-normal">Books pile up in one's home and take up too much space. Hence a solution to ending this is to provide people a place to donate all these books.</p>
      </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Book Delivery</h2>
          <p class="lead">Hand the Book to any of our 2 shelters</p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
      <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Recycling</h2>
          <p class="lead">Help the world reuse your books and help others learn</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div></div>
      </div>
    </div>

     <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">It all starts with you</h1>
        <p class="lead font-weight-normal">Below is the map that shows all the location you can drop your books off. Feel free to contact them!</p>
      </div>
    </div>




<body>

    {!! $map['html'] !!}
    </body>
    


</html>


@endsection