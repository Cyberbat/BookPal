<?php

namespace App\Http\Controllers;

use App\Books;
use App\Genre;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($genresulg= null)
    {
        if($genresulg){
            $genreId= Genre::where('slug',$genresulg)->first()->id;
            $book=Books::where('genre_id',$genreId)->latest()->paginate(10);
        }else{

            
        }


        return view('home',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.createBook');
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
        'author'=>'required',
        'condition'=>'required',
        'body'=>'required',
        'genre_id'=>'required | exists:genres,id',
        'thumbbook'=> ['required','image'],
        'bookim1'=> ['required','image'],
        'bookim2'=> ['required','image'],
        'bookim3'=> ['required','image']
        ]);

        $book= Books::create([
        'user_id'=>auth()->id(),
        'genre_id'=> request('genre_id'),
        'author'=> request('author'),
        'title'=>request('title'),
        'condition'=>request('condition'),
        'body'=>request('body'),
           'tumbnail_image' =>request()->file('thumbbook')->store('bookim', 'public'),
           'bookimage1' =>request()->file('bookim1')->store('bookim', 'public'),
           'bookimage2' =>request()->file('bookim2')->store('bookim', 'public'),
           'bookimage3' =>request()->file('bookim3')->store('bookim', 'public')
        ]);
        return redirect($book->path())->with('flash','Your Book is uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show($genreId, Books $books)
    {

        return view('books.show',compact('books'));

            }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books)
    {



    $books->delete();

    if(request()->wantsJson()){

    return response([],204);
        
        }

        return redirect('/home')->with('flash','Book has been deleted') ;
    }
}
