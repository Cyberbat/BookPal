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
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Set Image</h1>
            <img src={{$books->tumbnail}} alt=  {{$books->tumbnail}}>
          </div>
        </div>
           <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Set Image</h1>
           <img src={{$books->tumbnail}} alt=  {{$books->tumbnail}}>
          </div>
        </div>
           <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Set Image</h1>
            <img src={{$books->tumbnail}} alt=  {{$books->tumbnail}}>
          </div>
        </div>

      </div>
  </div>

 <div class="container">
 <a href="#" class="btn btn-outline-primary">Request Book </a>
</div>
@endsection