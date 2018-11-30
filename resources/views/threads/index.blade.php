@extends('layouts.app')
@section('content')
            
<div class="container marketing">
    <div class="row">

        @forelse ($threads as $thread)

        <div class="col-lg-4" style="padding-bottom:  5%">
       
           
            <img class="rounded-circle" src="/storage/{{ $thread->creator->avatar() }}"  width="100" height="100" style="margin-bottom: -35px">
  <a href="/threads/{{$thread->channel->slug}}"> <p style="margin-left: 200px">{{$thread->channel->name}}</p></a>
            <div>

            <a href="/profile/{{$thread->creator->name}}"> {{$thread->creator->name}} </a> created {{$thread->created_at->diffForHumans()}} with
            <strong><a href="{{$thread->path()}}">{{$thread->replies_count}} {{str_plural('reply',$thread->replies_count)}}</a></strong>

        </div>
            <h2><a href="{{$thread->path()}}"> {{$thread->title}}</a></h2>
            <p>{{$thread->body}}</p>
             
        </div>
           @empty
                <p> No results yet</p>
                @endforelse   


    </div>
          {{$threads->links()}}
</div>

 
                 

@endsection