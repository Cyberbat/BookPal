@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload your Book</div>

                <div class="panel-body">
            
                <form method="POST" action="/books" enctype="multipart/form-data">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="">Genres</label>

                        <select name="genre_id" id="genre_id" class="form-control" required>

                             <option >Choose a Genre...</option>}
                            
                            @foreach(App\Genre::all() as $genre)

                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                            

                            @endforeach
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name ="title" value="{{old('title')}}"placeholder="title" required>
                    </div>


                      <div class="form-group">
                        <label for="title">Author:</label>
                        <input type="text" class="form-control" id="author" name ="author" value="{{old('author')}}"placeholder="author" required>
                    </div>

                      <div class="form-group">
                        <label for="title">Condition:</label>

                          <select type="text" class="form-control" id="condition" name ="condition" placeholder="condition" required>
                            <option value="fiat">Excellent</option>
                            <option value="New">Good</option>
                            <option value="saab">Slighlty Damaged</option>
                            <option value="saab">Out of Shape</option>
                        
                          </select>
                    </div>
                    
                    <div class="form-group" >
                        <label for ="body">Small Summary:</label>

                            <textarea name="body" id="body" class="form-control"rows="8" required>{{old('title')}}</textarea> 
                       
                    </div>
                    <div>

                  <h5>Add The Thumbnail:</h5> <input type="file" name="thumbbook" class="btn btn-primary" style="margin:20px"> 
              </div>
              <div>

                    <h5> Add The Cover:</h5>  <input type="file" name="bookim1" class="btn btn-primary"  style="margin:20px">
            </div>
            <div>
                    <h5> Add The Side:</h5> <input type="file" name="bookim2" class="btn btn-primary" style="margin:20px">
              </div>
              <div>
                   <h5>  Add The Back: </h5> <input type="file" name="bookim3" class="btn btn-primary" style="margin:20px">
              </div>

                    <button type="submit" class="btn btn-primary" style="margin-left: 300px; margin-top: 30px"> Upload Books</button>
              

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
