<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\EduBooks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $book=Books::latest()->paginate(10);
        return view('home');
    }   

    public function litindex()
    {
        $book=Books::latest()->paginate(10);
        return view('lit.home',compact('book'));
    }

      public function eduhome()
    {
        $book=EduBooks::latest()->paginate(10);
        return view('eduhome.home',compact('book'));
    }
}
