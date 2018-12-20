@extends('layouts.app')

@section('content')


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            
  <body>


  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="/storage/bckg/library-wallpapers-28681-2745316.jpg" alt="First slide">
      <div class="container">
              <div class="carousel-caption">
                <h1 style="color:weight">Welcome to The Lit side of BookPal</h1>
                <p>Below you'll find a selection of books to exchange</p>
                <small>Photo : Trinity College Library</small>
                <div>
                   <a href="/books/create"><button class=" btn btn-primary" type="submit" > Post new Literary Book</button></a>
                  
                </div>
              </div>
            </div>
          </div>
         
    

</div>
 <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-white">BookPal is a Book Exchange Platform with the intent of bringing people closer using books as a medium</p>
              <p class="text-white">Feel Free to Browse through the books and drop a message to the owner</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Filter the Books through genres</h4>

        
            <!-- Left Side Of Navbar -->
       
            <ul class="navbar-nav mr-auto">
         
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Book Genres   <span class="caret"></span>
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                  @foreach (App\Genre::all() as $genre)
                    <a class="dropdown-item" href="/books/{{$genre->slug}}">{{$genre->name}}</a>
                    @endforeach
 
                </div>
            </li>

           
                   
        </ul>
   
 
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="{{ url('/home') }}" class="navbar-brand d-flex align-items-center">
            <?xml version="1.0" encoding="iso-8859-1"?>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 335.08 335.079" style="enable-background:new 0 0 335.08 335.079;" xml:space="preserve">
  <g>
    <g>
      <path d="M311.175,115.775c-1.355-10.186-1.546-27.73,7.915-33.621c0.169-0.108,0.295-0.264,0.443-0.398    c7.735-2.474,13.088-5.946,8.886-10.618l-114.102-34.38L29.56,62.445c0,0-21.157,3.024-19.267,35.894    c1.026,17.89,6.637,26.676,11.544,31l-15.161,4.569c-4.208,4.672,1.144,8.145,8.88,10.615c0.147,0.138,0.271,0.293,0.443,0.401    c9.455,5.896,9.273,23.438,7.913,33.626c-33.967,9.645-21.774,12.788-21.774,12.788l7.451,1.803    c-5.241,4.736-10.446,13.717-9.471,30.75c1.891,32.864,19.269,35.132,19.269,35.132l120.904,39.298l182.49-44.202    c0,0,12.197-3.148-21.779-12.794c-1.366-10.172-1.556-27.712,7.921-33.623c0.174-0.105,0.301-0.264,0.442-0.396    c7.736-2.474,13.084-5.943,8.881-10.615l-7.932-2.395c5.29-3.19,13.236-11.527,14.481-33.183    c0.859-14.896-3.027-23.62-7.525-28.756l15.678-3.794C332.949,128.569,345.146,125.421,311.175,115.775z M158.533,115.354    l30.688-6.307l103.708-21.312l15.451-3.178c-4.937,9.036-4.73,21.402-3.913,29.35c0.179,1.798,0.385,3.44,0.585,4.688    L288.14,122.8l-130.897,32.563L158.533,115.354z M26.71,147.337l15.449,3.178l99.597,20.474l8.701,1.782l0,0l0,0l26.093,5.363    l1.287,40.01L43.303,184.673l-13.263-3.296c0.195-1.25,0.401-2.89,0.588-4.693C31.44,168.742,31.651,156.373,26.71,147.337z     M20.708,96.757c-0.187-8.743,1.371-15.066,4.52-18.28c2.004-2.052,4.369-2.479,5.991-2.479c0.857,0,1.474,0.119,1.516,0.119    l79.607,25.953l39.717,12.949l-1.303,40.289L39.334,124.07l-5.88-1.647c-0.216-0.061-0.509-0.103-0.735-0.113    C32.26,122.277,21.244,121.263,20.708,96.757z M140.579,280.866L23.28,247.98c-0.217-0.063-0.507-0.105-0.733-0.116    c-0.467-0.031-11.488-1.044-12.021-25.544c-0.19-8.754,1.376-15.071,4.519-18.288c2.009-2.052,4.375-2.479,5.994-2.479    c0.859,0,1.474,0.115,1.519,0.115c0,0,0.005,0,0,0l119.316,38.908L140.579,280.866z M294.284,239.459    c0.185,1.804,0.391,3.443,0.591,4.693l-147.812,36.771l1.292-40.01l31.601-6.497l4.667,1.129l17.492-5.685l80.631-16.569    l15.457-3.18C293.261,219.146,293.466,231.517,294.284,239.459z M302.426,185.084c-0.269,0.006-0.538,0.042-0.791,0.122    l-11.148,3.121l-106.148,29.764l-1.298-40.289l34.826-11.359l84.327-27.501c0.011-0.005,4.436-0.988,7.684,2.315    c3.144,3.214,4.704,9.537,4.52,18.28C313.848,184.035,302.827,185.053,302.426,185.084z" fill="#FFFFFF"/>
    </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg><circle cx="12" cy="13" r="4"></circle></svg>

            <strong></strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <body>


             <div class="container" style="margin-bottom: -100px">
          <div class="navbar-header">
            <button type="button" class="btn" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-controls="navbar s" style="background-color: #f8fafc"> 
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="30px" height="30px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
          <g>
            <g id="Search">
              <g>
                <path d="M382.5,0C255.759,0,153,102.759,153,229.5c0,53.034,18.149,101.707,48.367,140.568L8.415,563.021
                  C2.812,568.625,0,575.949,0,583.312c0,7.344,2.812,14.688,8.415,20.292C14,609.208,21.343,612,28.688,612
                  s14.688-2.792,20.272-8.396l192.971-192.972C280.793,440.851,329.467,459,382.5,459C509.241,459,612,356.241,612,229.5
                  S509.241,0,382.5,0z M382.5,401.625c-94.917,0-172.125-77.208-172.125-172.125c0-94.917,77.208-172.125,172.125-172.125
                  c94.917,0,172.125,77.208,172.125,172.125C554.625,324.417,477.417,401.625,382.5,401.625z"/>
              </g>
            </g>

          </svg>

            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse"  >

            <ul class="nav navbar-nav">

             
  <ais-index
    app-id="BFBHHRFHJ5"
    api-key="28035e0d1044cc3b6fa5144553a0f22a"
    index-name="books"
  >
    <ais-search-box style="margin-top: 30px" class="search"></ais-search-box>

    <ais-stats></ais-stats>



    <ais-results>
      <template slot-scope="{ result }">
        <h2>
             <h2>
      <a :href="'/books/'+result.genre_id+'/'+result.id">
        @{{ result.title }}
      </a>
    </h2>
        </h2>
      </template>
    </ais-results>
      <hr>

    Filter By Author:

    <ais-refinement-list attribute-name="author"></ais-refinement-list>
    <hr>
        Filter By Condition:
    <ais-refinement-list attribute-name="condition"></ais-refinement-list>


{{-- <ais-pagination></ais-pagination>
 --}}  </ais-index>
            </ul>
          
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->




 </div>

    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
             @foreach($book as $it)
            <div class="col-md-4">

              <a href="{{$it->path()}}">
              <div class="card mb-4 shadow-sm">
                <img src="/storage/{{ $it->tumbnail_image }}" alt= {{$it->tumbnail}}; height= 300px>
                <div class="card-body">
                  <p class="card-text">{{$it->title}}.</p>

                  <p> Uploaded by {{$it->owner->name}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                
                    <small class="text-muted">{{$it->created_at->diffForHumans()}}</small>

                  </div>
                </div>
              </div>
            </div>
          </a>
                @endforeach
        </div>
       {{$book->links()}}
     

</div>
</div>
</div>
    </main>

  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
  </body>

</html>


@endsection
