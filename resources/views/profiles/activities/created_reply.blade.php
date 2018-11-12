@component('profiles.activities.activity')

@slot('heading')
<a href="{{$activity->subject->thread->path()}}">
  <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-6">
            <h2 class="featurette-heading text-muted">{{$profileUser->name}} replied to the <span class="text-muted"> {{$activity->subject->thread->title}}'s Book Blog</span></h2>
          </div>
      </div>

@endslot

@slot('body')

        <div class="row featurette">
          <div class="col-md-7">
            <p class="lead text-muted">{{$activity->subject->body}}</p>
          </div>
          <div class="col-md-5">
          </div>
        </div>

        <hr class="featurette-divider">
        @endslot
    </a>

@endcomponent

