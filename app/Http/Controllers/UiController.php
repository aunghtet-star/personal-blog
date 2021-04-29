<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\LikesDislike;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\StudentCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $skills = Skill::simplepaginate(10);
        $projects =Project::all();
        $studentCount= StudentCount::find(1);
        $posts = Post::latest()->take(6)->get();
        return view('ui-panel.index',compact('skills','projects','studentCount','posts'));
    }
    public function blogposts(){
        $categories =Category::all();
        $posts = Post::simplepaginate(10);
        return view('ui-panel.posts',compact('categories','posts'));
    }
    public function detail($id){

        if (!Auth::check()){
            return redirect('/login');
        }else{
            $posts = Post::find($id);
            $likes = LikesDislike::where('post_id',$id)->where('type','like')->get();
            $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get();
            $likeStatus = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();
            $comments = Comment::where('post_id',$id)->where('status','show')->get();
            return view('ui-panel.post-detail',
                compact('posts','likes','dislikes','likeStatus','comments'));
        }

    }
    public function search(Request $request){

        $searchData = '%'.$request->search_data.'%';
        $categories =Category::all();
        $posts = Post::where('title','like',$searchData)
            ->orwhere('content','like',$searchData)
            ->orWhereHas('category',function ($category) use ($searchData) {
                $category->where('name','like',$searchData);
            })
            ->simplepaginate(10);
        return view('ui-panel.posts',compact('categories','posts'));


    }

    public function searchCat($catId){
        $categories =Category::all();
        $posts = Post::where('category_id',$catId)->simplepaginate(10);
        return view('ui-panel.posts',compact('categories','posts'));
    }
}
