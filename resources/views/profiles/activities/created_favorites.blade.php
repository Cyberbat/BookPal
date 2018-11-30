@component('profiles.activities.activity')

@slot('heading')


<a href="{{$activity->subject->favorited->path()}}">
          <p>Favorite:</p>

        <div class="row featurette" >

  
      <div class="col-md-3">
          </div>
          <div class="col-md-5">
           <h2 class="text-muted"> {{$profileUser->name}} favorited a reply </h2>


		</div>
</div>
@endslot

@slot('body')

		

		     <div class="row featurette">

      <div class="col-md-2">
     </div>
          <div class="col-md-7">

             <p class="text-muted">{{$activity->subject->favorited->body}}</p>
          </div>
     
        </div>

        <hr>


</a>

	


@endslot
@endcomponent

