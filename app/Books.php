<?php

namespace App;
use App\User;
use App\Genre;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Books extends Model
{

    use RecordsActivity, Searchable;

	protected $guarded =[];

    public function path(){
    return '/books/'.$this->genre->slug.'/'.$this->id;
}

    public function owner(){

		return $this->belongsto(User::class, 'user_id');

	}

	public function genre(){

		return $this->belongsTo(Genre::class);
	}
	 

     
}
