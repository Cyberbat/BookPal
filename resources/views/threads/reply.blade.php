          <div id="reply-{{$reply->id}}" class="panel panel-default">
            <div class="panel-heading">
                <div>
                	<hr>
                	
            			<a href="/profile/{{$reply->owner->name}}">
                        {{$reply->owner->name}} </a> said
                 		{{$reply->created_at -> diffForHumans()}}  
                       
                       <div style="padding-left: 600px; padding-bottom: 10px">
                           
                     
                            <form method="POST" action="/replies/{{$reply->id}}/favorites">
                                {{csrf_field()}}
                            <button type="submit" class="btn btn-default"  {{$reply->isFavorited() ? 'disabled' : ''}}> Fav Button Nb:
                              {{$reply->favorites->count()}}
                            </button>
                            </form>
                           

                            {{-- Favorite counter --}}
                      </div>
                        
         
                 			<div class='panel-body'>

							{{$reply->body}}

							</div>

@can('update',$reply)
              <div class="panel-footer">
                <form method="POST" action="/replies/{{$reply->id}}">

                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button type="Submit" class="btn btn-danger">Delete Reply</button>
              </div>
@endcan
                 		<hr>

    			
                </div>
            </div>
            </div>