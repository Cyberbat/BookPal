<?php

namespace App\Http\Controllers;

use App\reply;
use App\Thread;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
   
    public function __contruct(){

        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($channelId, Thread $thread)
    {
            
             $this->validate(request(),[

                'body'=>'required',
                


              ]);

            $thread->addReply([

                'body' =>request('body'),
                'user_id' =>auth()->id()

           ]);

            return back()->with('flash','Replied to the thread is posted');

            }

    /**
     * Display the specified resource.
     *
     * @param  \App\reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(reply $reply)
    {
        $this->authorize('update',$reply);

        $reply->delete();

            return back()->with('flash','Replied deleted');

            }
}
