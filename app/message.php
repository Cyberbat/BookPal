<?php

namespace App;

Use App\User;


use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $guarded =[];


    public function fromContact(){

    	return $this->hasOne(User::class, 'id', 'from'); 
    }
}
