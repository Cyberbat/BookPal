@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">

	<div class="col-sm-12">

		<div class="card">

	
				<chat-app :user="{{auth()->user()}}"></chat-app>


		</div>
		
	</div>
	</div>

	</div>

@endsection