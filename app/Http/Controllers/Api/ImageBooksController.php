<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Books;
use App\EduBooks;

class ImageBooksController extends Controller
{

	 public function __construct(){
        $this->middleware('auth');
    }
    public function store($book)
    {
        $this->validate(request(),[

        	'thumbbook'=> ['required','image'],
        	'bookim1'=> ['required','image'],
        	'bookim2'=> ['required','image'],
        	'bookim3'=> ['required','image']
        ]);
        	
         Books::where('id', $book)->update([

        	$ok ='tumbnail_image' =>request()->file('thumbbook')->store('bookim', 'public'),
        	$book1 ='bookimage1' =>request()->file('bookim1')->store('bookim', 'public'),
        	$book2 ='bookimage2' =>request()->file('bookim2')->store('bookim', 'public'),
        	$book3 ='bookimage3' =>request()->file('bookim3')->store('bookim', 'public')
        ]);

        return back();

            }


    public function storeedu($book)
    {
        $this->validate(request(),[

            'thumbbook'=> ['required','image'],
            'bookim1'=> ['required','image'],
            'bookim2'=> ['required','image'],
            'bookim3'=> ['required','image']
        ]);
            
         EduBooks::where('id', $book)->update([

            $ok ='tumbnail_image' =>request()->file('thumbbook')->store('bookim', 'public'),
            $book1 ='bookimage1' =>request()->file('bookim1')->store('bookim', 'public'),
            $book2 ='bookimage2' =>request()->file('bookim2')->store('bookim', 'public'),
            $book3 ='bookimage3' =>request()->file('bookim3')->store('bookim', 'public')
        ]);

        return back();

            }
}
