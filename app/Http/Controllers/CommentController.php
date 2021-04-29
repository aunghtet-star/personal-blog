<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request,$postId){
        $request->validate(['comment'=>'required']);
        $comment=Comment::create([
            'post_id'=>$postId,
            'user_id'=> Auth::user()->id,
            'text'=>$request->comment
        ]);
        return back();
    }
}
