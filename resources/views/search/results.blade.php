@extends('layouts.app')

@section('content')


<div class="container"> 


                    @if(count($errors))


                <ul class="alert alert-danger">
                
                <li>
                    @foreach($errors->all() as $error)

                {{$error}}

                @endforeach
                </li>

                </ul>

                @endif


      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
        <img class="mr-3" src="../../assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class="lh-100">
          <h1 class="mb-0 text-white lh-100">Search Results for: '{{request()->input('search')}}'</h1>
       <p> {{$book->count()}} {{str_plural('result',$book->count())}} for Lit books / {{$edubooks->count()}} {{str_plural('result',$book->count())}} for Edu books  / {{$blog->count()}} {{str_plural('result',$blog->count())}} for blogs / {{$blog->count()}} for Profiles </p>


        </div>
      </div>

 @forelse($book as $books)
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h2 class="border-bottom border-gray pb-2 mb-0">Literary Books</h2>
        <a href="{{$books->path()}}">
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">  Book: {{$books->title}} written by :  {{$books->author}} </strong> 
          </p>
        </div>
    </a>
      </div>

         @empty
       {{--         <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Books</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">No Result</strong>
          </p>
        </div>
      </div> --}}
                @endforelse   

 @forelse($edubooks as $edubook)
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h2 class="border-bottom border-gray pb-2 mb-0">Educational Books</h2>
        <a href="{{$edubook->path()}}">
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">  Book: {{$edubook->title}} written by :  {{$edubook->author}} </strong> 
          </p>
        </div>
    </a>
      </div>

         @empty
       {{--         <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Books</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">No Result</strong>
          </p>
        </div>
      </div> --}}
                @endforelse   

@forelse($blog as $blogs)
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h2 class="border-bottom border-gray pb-2 mb-0">Blogs</h2>
        <a href="{{$blogs->path()}}">
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{$blogs->title}} </strong>
          </p>
        </div>
    </a>
        </div>

        @empty
          {{--      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Blogs</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">No Result</strong>
          </p>
        </div>
      </div> --}}
           @endforelse   
            

@forelse($profile as $profiles)
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h2 class="border-bottom border-gray pb-2 mb-0">Profiles</h2>
        
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">

          <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><img class="rounded-circle" src="/storage/{{ $profiles->avatar() }}"  width="100" height="100"> <a href="/profile/{{$profiles->name}}">{{$profiles->name}} </a></strong>
          </p>
        </div>

        </div>

        @empty
   {{--             <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Profiles</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">No Result</strong>
          </p>
        </div>
      </div> --}}
           @endforelse   
            
           



{{-- 
              <img class="rounded-circle" src="/storage/{{ $thread->creator->avatar() }}"  width="100" height="100" style="margin-bottom: -35px">
  <a href="/threads/{{$thread->channel->slug}}"> <p style="margin-left: 200px">{{$thread->channel->name}}</p></a>
            <div>

            <a href="/profile/{{$thread->creator->name}}"> {{$thread->creator->name}} </a>
 --}}
        
@endsection