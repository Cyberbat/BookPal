@component('profiles.activities.activity')

@slot('heading')
<a href="{{$activity->subject->thread->path()}}">
<p>Reply:</p>
   

     <div class="row featurette" >


      <div class="col-md-2">
          </div>
          <div class="col-md-7">
           <h2 class="text-muted" style="padding-bottom: 3%"> {{$profileUser->name}} replied to 
 <span class="text-muted">{{$activity->subject->thread->title}} Blog: </h2></span></h2>


    </div>
</div>
@endslot

@slot('body')

         <div class="row featurette">

      <div class="col-md-2">
     </div>
          <div class="col-md-7">

             <p class="text-muted">{{$activity->subject->body}}</p>
          </div>
     
        </div>

        <hr class="featurette-divider">
        @endslot
    </a>


        <div class="row featurette">

      <div class="col-md-2">
     </div>
          <div class="col-md-7">

             <p class="text-muted">{{$activity->subject->body}}</p>
          </div>
     
        </div>

@endcomponent

