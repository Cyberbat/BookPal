@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            @forelse ($threads as $thread)
                    <div class="container">
                        <div class="jumbotron p-2 p-md-5 text-black rounded bg-light">
                            <div class="col-md-10 px-0">
                                <h1 class="display-4 font-italic"><a href="{{$thread->path()}}"> {{$thread->title}}</a></h1>
                                Created by:
                                <a href="/profile/{{$thread->creator->name}}">
                                    {{$thread->creator->name}}
                                </a>
                                {{$thread->created_at->diffForHumans()}}
                                
                                with
                                <strong><a href="{{$thread->path()}}">{{$thread->replies_count}} {{str_plural('reply',$thread->replies_count)}}</a></strong>
                                <p class="lead my-3">{{$thread->body}}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @empty
                <p> No results yet</p>
                @endforelse
            </div>
            
        </div>
    </div>
</div>
@endsection