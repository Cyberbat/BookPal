          <div id="reply-{{$reply->id}}" class="panel panel-default">
            <div class="panel-heading">
                <div>
                
                	
            			<a href="/profile/{{$reply->owner->name}}">
                        {{$reply->owner->name}} </a> said
                 		{{$reply->created_at -> diffForHumans()}}  
                       
                       <div style="padding-left: 600px; padding-bottom: 10px">
                           
                     @if( auth()->user() !=$reply->owner)
                            <form method="POST" action="/replies/{{$reply->id}}/favorites">
                                {{csrf_field()}}
                            <button type="submit" class="btn btn-default"  {{$reply->isFavorited() ? 'disabled' : ''}}> <?xml version="1.0" encoding="iso-8859-1"?>
<!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->

<svg height="30px" viewBox="-21 -36 681.33353 681" width="30px" xmlns="http://www.w3.org/2000/svg"><path d="m637.8125 230.527344c-2.046875-6.300782-7.210938-11.097656-13.640625-12.675782l-187.070313-45.894531-101.453124-163.730469c-3.496094-5.632812-9.648438-9.058593-16.273438-9.058593s-12.78125 3.425781-16.269531 9.058593l-101.453125 163.734376-187.070313 45.890624c-6.433593 1.578126-11.597656 6.375-13.644531 12.675782-2.046875 6.300781-.6875 13.21875 3.589844 18.277344l124.367187 147.082031-14.164062 192.097656c-.484375 6.605469 2.476562 12.996094 7.835937 16.890625 5.367188 3.894531 12.359375 4.742188 18.492188 2.234375l178.316406-72.828125 178.320312 72.828125c2.332032.953125 4.789063 1.417969 7.230469 1.417969 3.988281 0 7.933594-1.242188 11.253907-3.652344 5.359374-3.894531 8.328124-10.289062 7.839843-16.890625l-14.160156-192.101563 124.363281-147.078124c4.28125-5.058594 5.640625-11.976563 3.589844-18.277344zm0 0"/></svg>

                             
                            </button>
@endif

                            <p>  Amount of love:  {{$reply->favorites->count()}}</p>
                            </form>
                           

                            {{-- Favorite counter --}}
                      </div>
                        
         
            <h4 style="padding: 2%">

							{{$reply->body}} </h4>

						

@can('update',$reply)
              <div class="panel-footer">
                <form method="POST" action="/replies/{{$reply->id}}">

                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button type="Submit" class="btn btn-primary">Delete Reply</button>
              </div>
@endcan
                 		

    			
                </div>
            </div>
            </div>