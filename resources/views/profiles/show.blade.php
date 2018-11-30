@extends('layouts.app')
@section('content')
<div class="container">




	<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="/storage/bckg/everest-minimalist-wallpaper-blue.jpg"  alt="First slide">
 			<div class="container">
              <div class="carousel-caption">

                

                  <img  src="/storage/{{ $profileUser->avatar() }}"  style=" flex: 2; display: flex; align-items: center;width: 200px; height: 200px; border-radius: 50%; margin: 0 auto">



  


                <h1 style="color: grey">{{$profileUser->name}}</h1>
                <p style="color: grey">{{$profileUser->bio()}}</p>
               <small style="color: grey"> Active Member since: {{$profileUser->created_at->format('d-m-Y')}}</small>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="/storage/bckg/everest-minimalist-wallpaper-blue.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1 style="color: grey">Favorite Literary Quote</h1>
                <p style="color: grey"> "{{$profileUser->quote()}}"</p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
@can('update',$profileUser)

  <nav class="navbar" style="margin-top: -11%; margin-bottom: 2% ">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="btn" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-controls="navbar s"> <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

              <li class="active"> Add Image: 

                <form method="POST" action="{{route('avatar',$profileUser)}}" enctype="multipart/form-data">

                    {{csrf_field()}}
                   <input type="file" name="avatar">

                   <button type="submit" class="btn btn-primary">Update Avatar</button>
                  </form>

                </li>

              <li><a>Edit your Bio:
               <form method="POST" action="/user/bio" >

                    {{csrf_field()}}
                  <textarea name="userbio" id="userbio" class="form-control"rows="8" required>{{$profileUser->bio()}}</textarea> 
                       

                   <button type="submit" class="btn btn-primary">Update Bio</button>
                  </form>

              </li>
                   <li><a>Edit your Quote:
                <form method="POST" action="/user/quote" enctype="multipart/form-data">

                    {{csrf_field()}}
                  <textarea name="userquote" id="userquote" class="form-control"rows="3" required>{{$profileUser->quote()}}</textarea> 
                       

                   <button type="submit" class="btn btn-primary">Update Quote</button>
                  </form>

              <li class="dropdown">
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
                  

                  @endcan


	@foreach($activities as $date=>$activity)

			<h3 class="page-header">  {{$date}} <hr></h3>
			@foreach($activity as $rec)
			@if(view()->exists("profiles.activities.".$rec->type))
			@include("profiles.activities.".$rec->type, ['activity'=>$rec])
			@endif
			@endforeach
     
  

	@endforeach

{{$threads->links()}}

	
</div>
@endsection



