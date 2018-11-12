@extends('layouts.app')

@section('content')


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            
  <body>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">BookPal</h1>
          <p class="lead text-muted">Here you will find the general books that people recently uploaded</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Upload a Book</a>
          </p>
        </div>
      </section>



    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
             @foreach($book as $book)
            <div class="col-md-4">

              <a href="/book/{{$book->id}}">
              <div class="card mb-4 shadow-sm">
                <img src={{$book->tumbnail}} alt=  {{$book->tumbnail}}>
                <div class="card-body">
                  <p class="card-text">{{$book->title}}.</p>
                  <div class="d-flex justify-content-between align-items-center">
                
                    <small class="text-muted">{{$book->created_at->diffForHumans()}}</small>

                  </div>
                </div>
              </div>
            </div>
          </a>
                @endforeach
        </div>
      
      </div>



    </main>

  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>

</html>


@endsection
