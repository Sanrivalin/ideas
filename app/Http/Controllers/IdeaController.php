<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //Function controller to show "idea" in other page.
    public function show(Idea $idea){
        // return view('ideas.show',[
        //     'idea'=>$idea,
        // ]);

         //testing accessing to comments, this return all the comments for comments model
        //  dd($idea->comments);



        //Shorten "return view()", creating automatically asociative arrray for us .
        return view('ideas.show',compact('idea'));
    }

    //atacching and storing what the user wrote in the form.
    public function store(){
        // dump();

        // This is a way to capture the text

        // $idea=new Idea([
        //     "content"=> request()->get('idea',''),
        // ]);
        // $idea->save();

        //This is other way

        //Laravel validation

        // The way can protect of massive assigning for example in "likes" is
        //only mass assign what we have "validated"
        // request()->validate([
        //     "content"=> "required|min:5|max:240",
        // ]);
        $validated = request()->validate([
                 "content"=> "required|min:5|max:240",
             ]);

             //Comparison Testing
            //  dump(request()->all());
            //  dd($validated);
             //Results:

             // app\Http\Controllers\IdeaController.php:50
            //  array:2 [▼
            //     "_token" => "Av9o7S6nu0TiMpzrzgR5LtUSnLKbLisw00Tusabx"
            //     "content" => "test567"
            // ]
             // app\Http\Controllers\IdeaController.php:51
            // array:1 [▼
            // "content" => "test567"
            // ]
        // Storing the id of the current logged in user
        //To get the id of the current login user we use "auth"
        // Adding to $validated table storing the ID of the current logged in user whenever we are creating a new Idea
        //This is an array key or object property. It indicates that the value on the right side of the assignment
        // (auth()->id()) will be stored in the $validated array or object under the key 'user_id'
        // id() Get the ID for the currently authenticated user.
        $validated['user_id'] = auth()->id();

        // With this we get all the post parameters
        // dd(request()->all());

        Idea::create(
            //This do the same that request all:
            // [
            //     'content'=>request()->get('content',''),
            // ]

            //Mass assigning
            // request()->all()

            //Secure way
            $validated
        );
        // Returning the user to home
        return redirect()->route('dashboard')->with('success','Your Idea was incrediable created successfully.');
    }
        //Function destroy to delete "idea"
        // route model binding(RMB) is a convenient feature that allows you to automatically
        //inject model instances into your routes. It was we did at parameter of destroy function, RMB figureout that ID is PK for Idea at Models folder.
    public function destroy(Idea $idea){
        // This check if only the owner of a idea has the ability to delete
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }

        //first way to doit
        // $idea = Idea::where('id',$id)->firstOrFail();
        // $idea->delete();

        //Second way to do it, but it was replaced with RMB
        // Idea::where('id',$id)->firstOrFail()->delete();

        $idea->delete();


        return redirect()->route('dashboard')->with('success','Your Idea was deleted successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea){
        // This check if only the owner of a idea has the ability to edit
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $editing = true;
        return view('ideas.show',compact('idea','editing'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $validated = request()->validate([
            "content"=> "required|min:5|max:240",
        ]);
        // First way
        // $idea->content = request()->get('content','');
        // $idea->save();

        //In this way using $validated param
        $idea->update($validated);

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated sucessfully!');
    }
}
