<?php

namespace App;

Use App\User;


use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $guarded =[];

    use Searchable;
    public function fromContact(){

    	return $this->hasOne(User::class, 'id', 'from'); 
    }
}
