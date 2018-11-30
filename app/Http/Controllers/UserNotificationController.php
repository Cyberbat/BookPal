<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\RequestBook;
use App\Notifications\Acceptnot;
use App\User;
use App\Books;

class UserNotificationController extends Controller
{


    public function _construct(){

    	$this->middleware('auth');
    }

     public function index(){

    	 

    	 return	auth()->user()->unreadNotifications;
    }

    public function destroy(User $user, $notificationid){
    	auth()->user()->notifications()->find($notificationid)->markAsRead();

    }

    public function bookreq($bookowner, $user, $booksid){


        $usertosend = User::find($bookowner);

        $userauth = User::find($user);

        $bookname=Books::find($booksid);
   

        $usertosend->notify(new RequestBook($userauth, $bookname->title));

       return back();



    }

    public function returnconfim($book, $user){


         $userauth = User::find($user);


         $userauth->notify(new Acceptnot($userauth, $book));

         return back();


    }
}
