@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a New Thread</div>

                <div class="panel-body">
            
                <form method="POST" action="/threads">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="">Channel</label>

                        <select name="channel_id" id="channel_id" class="form-control" required>

                             <option >Choose a Category...</option>}
                            
                            @foreach(App\Channel::all() as $channel)

                            <option value="{{$channel->id}}">{{$channel->name}}</option>}
                            

                            @endforeach
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name ="title" value="{{old('title')}}"placeholder="title" required>
                    </div>
                    
                    <div class="form-group" >
                        <label for ="body">Bod:</label>

                            <textarea name="body" id="body" class="form-control"rows="8" required>{{old('title')}}</textarea> 
                       
                    </div>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </form>

                <div class="form-group" style="padding-top: 20px">
                    
                
            @if(count($errors))


                <ul class="alert alert-danger">
                
                <li>
                    @foreach($errors->all() as $error)

                {{$error}}

                @endforeach
                </li>

                </ul>

                @endif

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
