
@component('profiles.activities.activity')

@slot('heading')



<a href="{{$activity->subject->path()}}">
  <p>Edu Books</p>
        <div class="row featurette" >


      <div class="col-md-2">
          </div>
          <div class="col-md-7">
           <h2 class="text-muted" style="padding-bottom: 3%"> {{$profileUser->name}} posted a Book with the Following Title
 <span class="text">:{{$activity->subject->title}} <div>Written by :{{$activity->subject->author}}</div> </h2></span></h2> 


		</div>
</div>
@endslot

@slot('body')


        <div class="row featurette">

      <div class="col-md-2">
     </div>
          <div class="col-md-7">

             <p class="text-muted"></p>
          </div>
     
        </div>


        <hr class="featurette-divider">

</a>
          @endslot

@endcomponent



