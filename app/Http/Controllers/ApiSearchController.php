<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Books;
use App\Thread;

class ApiSearchController extends Controller
{
    public function search(Request $request)
    {
           $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('search')) {

            // Using the Laravel Scout syntax to search the products table.
            $posts = Books::search($request->get('search'))->get();
            // $posts = Thread::search($request->get('search'))->get();

            // If there are results return them, if none, return the error message.
            return $posts->count() ? $posts : $error;

        }

        // Return the error message if no keywords existed
        return $error;
    }

}