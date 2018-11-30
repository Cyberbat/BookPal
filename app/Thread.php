<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\Threadwasupdated;
use Laravel\Scout\Searchable;
class Thread extends Model
{

use Searchable;
    use RecordsActivity;

protected $guarded =[];

protected static function boot(){

        parent::boot();
        static::addGlobalScope('replyCount', function($builder){

            $builder->withCount('replies');

        });


}

public function path(){
    return "/threads/{$this->channel->slug}/{$this->id}";
}
public function replies(){
        return $this->hasMany(reply::class);
}
public function creator(){
        return $this->belongsTo(User::Class, 'user_id');
}

public function addReply($reply){

$reply = $this->replies()->create($reply);


$this->creator->notify(new Threadwasupdated($this, $reply));

//Prepare Notification for the user of the thread

return $reply;
}


public function channel(){
return $this->belongsTo(Channel::class);
}


}