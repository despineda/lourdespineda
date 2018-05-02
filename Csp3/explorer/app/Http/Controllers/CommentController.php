<?php

namespace App\Http\Controllers;
use App\Comment;

class CommentController extends Controller
{
    
    //delete comment
    public function deleteComment($id){
        Comment::where('id',$id)
        ->delete();
        return back(); 
    }
}
