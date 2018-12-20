@extends('layouts.app')
@section('content')

{{-- <chat-app :user="{{$books->user_id}}"></chat-app> --}}

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">

      <h1 class="display-4"> {{$books->title}}</h1>
      <h2> Written by: {{$books->author}}</h2>
      <h2> Condition: {{$books->condition}}</h2>
      <p class="lead">{{$books->body}}</p>
    </div>

<div class="container">



               


        <div class="container" style="background-color: grey">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-3">
              <h4 class="text-white">About</h4>
              <p class="text-white">Feel Free to Browse through the books and drop a message to the owner</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
                 @can('update',$books->owner)
              <h4 class="text-white">Update the images</h4>

        
            <!-- Left Side Of Navbar -->

            <div class="container">
       
            <ul class="navbar-nav mr-auto">
            
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   <button class="btn btn-primary">Edit The Photos </button>
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <form method="POST" action="/api/edubooks/{{$books->id}}/bookimage" enctype="multipart/form-data">

                    {{csrf_field()}}
                  Add Thumbnail: <input type="file" name="thumbbook" class="btn btn-secondary"> 
                  Add The Cover of the Book: <input type="file" name="bookim1" class="btn btn-secondary">
                  Add The Side of the Book:  <input type="file" name="bookim2" class="btn btn-secondary">
                  Add The Back of the Book:  <input type="file" name="bookim3" class="btn btn-secondary">
                       <button type="submit" class="btn btn-primary">Add Image</button>
 
                  </form>
                  

                    @endcan
         
 
                </div>
            </li>
            
            
        </ul>
   
 
            </div>
          </div>
        </div>
      </div>
                  
                 
               

</div>

  

    <div class="container">

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active">
             <img src="/storage/{{$books->bookimage1}}" width= 500px height=300px alt=  {{$books->bookimage1}}>
            <div class="carousel-caption d-none d-md-block">
              <h3>Front</h3>
              <p>Check the Front</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item">
             <img src="/storage/{{$books->bookimage2}}" width= 400px height=300px alt=  {{$books->bookimage2}}>
            <div class="carousel-caption d-none d-md-block">
              <h3>Side</h3>
              <p>Check the side</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
              <img src="/storage/{{$books->bookimage3}}" width= 200px height=400px alt=  {{$books->bookimage3}}>
            <div class="carousel-caption d-none d-md-block">
              <h3>Back</h3>
              <p>Check the back</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </header>
     <div class="container">
    @if(auth()->user() ==$books->owner )
            <form action="/edubooks/{{$books->id}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-primary">Delete</button>
            </form>
            @endif

          </div>
 

@if( auth()->user() !=$books->owner)
 <div class="container">
        
      <form method="POST" action="/profile/edunotifications/{{$books->owner->id}}/{{auth()->user()->id}}/{{$books->id}}">

                    {{csrf_field()}}

                       <button type="submit" class="btn btn-primary">Request Book</button>
 
                  </form>
</div>
@endif

@endsection