
@component('profiles.activities.activity')

@slot('heading')
<a href="{{$activity->subject->path()}}">
        <div class="row featurette" >

      <div class="col-md-5">
          </div>
          <div class="col-md-5">
           <h2 class="text-muted"> {{$profileUser->name}} posted <span class="text-muted">{{$activity->subject->title}} stating</h2></span></h2>


		</div>
</div>
@endslot

@slot('body')


        <div class="row featurette">

      <div class="col-md-5">
     </div>
          <div class="col-md-7">

             <p class="text-muted">{{$activity->subject->body}}</p>
          </div>
     
        </div>


        <hr class="featurette-divider">

</a>
          @endslot

@endcomponent



