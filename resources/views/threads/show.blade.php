@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="/profile/{{$thread->creator->name}}"> {{$thread->creator->name}}</a> posted:
                    <h1>{{$thread->title}}</h1>

                    
                    @can('update' , $thread)
                    <form action="{{$thread->path()}}" method="POST">

                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                    <button type="submit" class="btn btn-link">Delete</button>
                    </form>
                    @endcan
                    
                </div>
                <div class="panel-body">
                    
                    {{$thread->body}}
                </div>
            </div>
            @foreach($replies as $reply)
            
            @include ('threads.reply')
            
            @endforeach
            {{$replies->links()}}
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
        <div class="col-md-4">
            
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <p>This is a cool thread by <a href="/profile/{{$thread->creator->name}}">{{$thread->creator->name}}</a> and has: {{$thread->replies_count}} {{str_plural('reply',$thread->replies_count)}}</p>
                    {{-- This is where we go to the thread model and do a general method to get count (i can use it for the profile page) --}}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection