<?php

namespace App;


use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

use App\Books;

class Genre extends Model
{
   use Searchable;

   public function books(){

		 	return $this->belongsTo(Books::class);
		 }
}
