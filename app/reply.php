<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
	  use RecordsActivity;

	    protected $guarded =[];

	    protected static function boot(){

        parent::boot();

}

    
	public function owner(){



		return $this->belongsto(User::class, 'user_id');

	}

	//Poly relationships

	public function favorites(){

		return $this->morphMany(Favorites::class, 'favorited');
	}

		public function favorite(){

			if(!$this->favorites()->where(['user_id'=>auth()->id()])->exists()){

				return $this->favorites()->create(['user_id'=>auth()->id()]);
		 }

	}

		 public function isFavorited(){

		 	return $this->favorites()->where('user_id',auth()->id())->exists();
		 }
 		
 		public function thread(){

		 	return $this->belongsTo(Thread::class);
		 }

		public function path(){

		 	return $this->thread->path()."#reply-{$this->id}";
		 }

    }
