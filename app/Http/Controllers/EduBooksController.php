<?php

namespace App\Http\Controllers;

use App\EduBooks;
use Illuminate\Http\Request;
use App\edugenre;;

class EduBooksController extends Controller
{
     public function index($genresulg= null)
    {
        if($genresulg){
            $genreId= edugenre::where('slug',$genresulg)->first()->id;
            $book=EduBooks::where('edugenre_id',$genreId)->latest()->paginate(10);
        }else{

            
        }


        return view('eduhome.home',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Educational.createedu');
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

        $book= EduBooks::create([
        'user_id'=>auth()->id(),
        'edugenre_id'=> request('genre_id'),
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
    public function show($genreId, EduBooks $books)
    {

        return view('Educational.showedu',compact('books'));

            }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(EduBooks $books)
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
    public function update(Request $request, EduBooks $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(EduBooks $books)
    {



    $books->delete();

    if(request()->wantsJson()){

    return response([],204);
        
        }

        return redirect('/home')->with('flash','Book has been deleted') ;
    }
}
