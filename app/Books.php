<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    

    public function owner(){

		return $this->belongsto(User::class, 'user_id');

	}
}
