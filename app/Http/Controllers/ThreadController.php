<?php
namespace App\Http\Controllers;
use App\Thread;
use App\Channel;
use Illuminate\Http\Request;
class ThreadController extends Controller
{
public function __construct(){
$this->middleware('auth')->except(['index','show']);
}
public function index($channelSlug =null)
{

if(request()->wantsJson()){

    return $threads;

}

//Filter by Channel
if($channelSlug){
$channelId= Channel::where('slug',$channelSlug)->first()->id;
$threads = Thread::with('channel')->where('channel_id',$channelId)->latest()->paginate(9);
}else{
$threads = Thread::with('channel')->latest()->paginate(9);
}


//Filter for the Username
if($username= request('by')){
$user=\App\User::where('name',$username)->firstOrFail();
$threads = Thread::with('channel')->where('user_id',$user->id);
$threads=$threads->paginate(9);
}


//Return Based on Populatrity 
if($thread= request('popular')){

Thread::getQuery()->orders=[];
$threads = Thread::with('channel')->orderBy('replies_count','desc');

$threads= $threads->paginate(9);
}


//Return the filter
return view('threads.index',compact('threads'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('threads.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$this->validate($request,[
'title'=>'required',
'body'=>'required',
'channel_id'=>'required | exists:channels,id'
]);
$thread= Thread::create([
'user_id'=>auth()->id(),
'channel_id'=> request('channel_id'),
'title'=>request('title'),
'body'=>request('body'),
]);
return redirect($thread->path())->with('flash','Your thread is published');
}
/**
* Display the specified resource.
*
* @param  \App\Thread  $thread
* @return \Illuminate\Http\Response
*/
public function show($channelId, Thread $thread)
{
return view('threads.show',[
'thread'=>$thread,
'replies'=>$thread->replies()->paginate(10)
]);
}
/**
* Show the form for editing the specified resource.
*
* @param  \App\Thread  $thread
* @return \Illuminate\Http\Response
*/
public function edit(Thread $thread)
{
//
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Thread  $thread
* @return \Illuminate\Http\Response
*/
public function update($channel, Thread $thread)
{


    $this->validate(request(),[

        'title'=>'required',
        'body'=>'required',


    ]);



     Thread::where('id', $thread->id)->update([

        'title'=> request('title'),
        'body'=> request('body'),


     ]);

    return back()->with('flash','Updated');



}
/**
* Remove the specified resource from storage.
*
* @param  \App\Thread  $thread
* @return \Illuminate\Http\Response
*/
public function destroy($channel,Thread $thread)
{

    $this->authorize('update',$thread);

    $thread->replies->each(function ($reply){
    	$reply->delete();

    });

    $thread->delete();

    if(request()->wantsJson()){

    return response([],204);
        
        }

        return redirect('/threads')->with('flash','Thread is deleted') ;
}
}