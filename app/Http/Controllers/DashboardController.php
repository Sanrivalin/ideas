<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Creating a new DB entry.
    public function index()
    {
        //To see a previuw of the email
        // return new WelcomeEmail(auth()->user());
        //eager loading is a technique used to reduce the number of
        // database queries when retrieving relationships. This is
        //particularly useful to avoid the N+1 query problem, where for each
        // record fetched, an additional query is made to retrieve related records.
        //Eager loading allows you to load the related data along with the main data,
        //thus reducing the number of queries.
        $ideas = Idea::orderBy('created_at','DESC');
        //check if there is a search
        //if there is, check the search value with out database

        //WHERE content like %test%

        if(request()->has("search")){

            $ideas=$ideas->where('content','like','%'. request()->get("search","") . '%');

        }
        // A long way witout using relationsships, to make that our comments appear
        // Comment::where('idea_id',$id)->get()

        // dump(Idea::all());
        return view('dashboard',[
            'ideas'=> $ideas->paginate(5)
        ]);
    }
}
