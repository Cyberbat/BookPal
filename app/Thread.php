<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Thread extends Model
{

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
$this->replies()->create($reply);
}
public function channel(){
return $this->belongsTo(Channel::class);
}
}