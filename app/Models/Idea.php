<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    protected $with=['user:id,name,image','comments.user:id,name,image'];

    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];

    //This prenvent security risk of Mass assigning
    protected $fillable = [
        'user_id',
        'content',
    ];

      // Comment::where('idea_id',12)->get('content')
      //informig that Idea has a relationship with comments
      //The name of the method is going to be the name o the table.
      //This code here automacally fetch all of your comments
      public function comments(){
        //The type of relationship we have
        return $this->hasMany(Comment::class);
    }
    //Defining relationship for our user, one user can have many ideas, and an idea belongs only to a user.
    // it was implemented in order to see the name or email of the user on "idea-card".
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->belongsToMany(User::class,'idea_like')->withTimestamps();
    }
}

