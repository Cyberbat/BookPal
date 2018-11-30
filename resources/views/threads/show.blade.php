@extends('layouts.app')
@section('content')
<div class="container">



      <div class="row mb-3">
        <div class="col-md-7">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Blog Post</strong>
                   <p>This post has: {{$thread->replies_count}} {{str_plural('reply',$thread->replies_count)}}</p>

              <h3 class="mb-0">
                              <img  src="/storage/{{ $thread->creator->avatar()}}"  style="  width: 70px; height: 70px; border-radius: 60%; margin: 0 auto">

                <a href="/profile/{{$thread->creator->name}}"> {{$thread->creator->name}}</a> posted:
              </h3>
              <h2 style="padding-top: 1%; padding-left: 20%">{{$thread->title}}</h2>
              <div class="mb-1 text-muted">{{$thread->created_at->diffForHumans()}}</div>
              <p class="card-text mb-auto">{{$thread->body}}</p>
             <div style="padding-top: 2%; padding-left: 90%">
            @can('update' , $thread)
            <form action="{{$thread->path()}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-primary">Delete</button>
            </form>
            @endcan
                </div>
            </div>
          </div>
        </div>

    



        <div class="col-md-3">

           @can('update',$thread->creator)






         

{{-- <form method="POST" action="/threads/{{$thread->channel_id}}/{{$thread->id}}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" value="{{$thread->title}}" required>
    </div>
    <div class="form-group">
        <label for="description">Body</label>
        <textarea name="body" type="text" class="form-control" style=" width: 255px; height: 300px" id="body" required placeholder="{{$thread->body}}" >{{$thread->body}}"</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form> --}}


  <nav class="navbar"  style="margin-left: -50%; margin-bottom: 2% " >
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="btn" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-controls="navbar s"> <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse" style="margin-left: 30%; margin-top: -20% " >

            <form method="POST" action="/threads/{{$thread->channel_id}}/{{$thread->id}}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <ul class="nav navbar-nav">

              <li class="active"> Edit Title: 

                <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" value="{{$thread->title}}" required>
                </li>

              <li><a>Edit Content:
         
                      <textarea name="body" type="text" class="form-control" style=" width: 255px; height: 300px" id="body" required placeholder="{{$thread->body}}" >{{$thread->body}}"</textarea>
                       

                   <button type="update" class="btn btn-primary" style="margin-top: 2%">Update</button>
                  

              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->

      </nav>

@endcan

       @if(auth()->user()!= $thread->creator)

                <h3 class="pb-3 mb-2 font-italic border-bottom">
         
          </h3>

       

          <div class="blog-post">
            <h2 class="blog-post-title">Leave a Reply</h2>
                       @if(auth()->check())
            
            <form method ="POST" action="{{$thread->path() .'/replies'}}">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Wut?" rows="5"></textarea>
                    
                </div>
                <button type="submit" class="btn btn-default">Post</button>
            </form>
            @else
            <p class="text-center">Please Sign in bru <a href="{{route('login')}}">Sign in</a></p>
            @endif
          </div>
          <div class="blog-post">
          </div>
          <nav class="blog-pagination">
          </nav>
        </div>

        </div>
        @endif

    </div>


    

<main role="main" class="container">
      <div class="row">

       @foreach($replies as $reply)
            

        <aside class="col-md-10 blog-sidebar">
             <div class="card flex-md-row mb-7 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Reply: </strong>

            @include ('threads.reply')
            
            
           
        </div>
        </div>
        </aside>
        @endforeach



      </div>



 {{$replies->links()}}
    </main>




@endsection