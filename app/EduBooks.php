<?php

namespace App;

use App\User;
use App\edugenre;

use Laravel\Scout\Searchable;


use Illuminate\Database\Eloquent\Model;

class EduBooks extends Model
{

	 use RecordsActivity,Searchable;
	 
   	protected $guarded =[];

    public function path(){
    return '/edubooks/'.$this->edugenre->slug.'/'.$this->id;
}

    public function owner(){

		return $this->belongsto(User::class, 'user_id');

	}

	public function edugenre(){

		return $this->belongsTo(edugenre::class);
	}
}
