<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\message;
use App\Events\NewMessage;


class ContactsController extends Controller
{


    public function index(){


         return view('messages.message');
    }
    public function get(){

        //get all the users expet the auth one

    	$contacts = User::where('id','!=',auth()->id())->get();


        //have the user id 

            $unreadIds = message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });

    	return response()->json($contacts);

    }

    public function getMessages($id){

        message::where('from',$id)->where('to',auth()->id())->update(['read'=>true]);

        $messages = message::where(function($q) use ($id){
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id){

            $q->where('from', $id);
            $q->where('to', auth()->id());

        })->get();

    	return response()->json($messages);

    }

 public function send(Request $request){

 
 	  $message = message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

 	  	 broadcast(new NewMessage($message));
 	   return response()->json($message);


    }


    
}
