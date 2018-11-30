<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Gerardojbaez\Messenger\Contracts\MessageableInterface;
use Gerardojbaez\Messenger\Traits\Messageable;

class User extends Authenticatable implements MessageableInterface
{
    use Messageable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_path','quote','bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName(){

        return 'name';

    }

       public function threads(){

            return $this->hasMany(Thread::class)->latest();

    }

    public function activity(){

        return $this->hasMany(Activity::class);

    }

    public function avatar(){

        if(! $this->avatar_path){

            return '/avatars/default.jpg';
        }

        return $this->avatar_path;
    }
        public function bio(){

        if(! $this->bio){

            return "Your Bio will appear here";
        }

        return $this->bio;
    }

      public function quote(){

        if(! $this->quote){

            return 'Your quote will appear here!';
        }

        return $this->quote;
    }
}
