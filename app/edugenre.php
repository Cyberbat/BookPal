<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\EduBooks;

class edugenre extends Model
{
       public function books(){

		 	return $this->belongsTo(EduBooks::class);
		 }
}
