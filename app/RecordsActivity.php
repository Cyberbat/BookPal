<?php

namespace App;


trait RecordsActivity 
{
	protected static function bootRecordsActivity(){

		   	static::created(function ($thread){

            $thread->recordActivity('created');
     
        });

		   	static::deleting(function($model){

		   		$model->activity()->delete();
		   	});

	}

   public function recordActivity($event){

        $this->activity()->create([
            'user_id'=>auth()->id(),
            'type'=>$this->getActivityType($event),
            ]);
}

public function activity(){

	return $this->morphMany('App\Activity','subject');
}

public function getActivityType($event){

   return $event.'_'. strtolower((new \ReflectionClass($this))->getShortName());
}
}
