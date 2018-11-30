@extends('layouts.app')
@section('content')


    <div class="container">
<h3>The data is being provided by:</h3>
   <a href="https://www.realsimple.com/work-life/entertainment/best-books-of-2018"> <p>Real Simple book platform</p></a>
   <a href="https://www.thrillist.com/entertainment/nation/best-books-of-2018#"> <p>Thrillist</p></a>
    <a href="https://www.goodreads.com/book/popular_by_date/2018"><p>Good Reads</p></a>
      
      <div class="card-deck mb-3 text-center">
      @foreach(App\Popularbooks::all() as $popbooks)
        <div class="card mb-7 shadow">

          <div class="card-body">

            
            <h3 class="card-title pricing-card-title">{{$popbooks->popbooks}}</h3>

          </div>

        </div>

@endforeach
    </div>



      </div>



@endsection