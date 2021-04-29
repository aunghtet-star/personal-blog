<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class PostController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::simplepaginate(10);
        return view('admin-panel.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image',
            'title' => 'required',
            'contect' => 'required'
        ]);
        $image = $request->image;
        $imageName = uniqid() . ' ' . $image->getClientOriginalName();
        $image->storeAs('postImages',  $imageName);

        $post=Post::create([
            'category_id' => $request->category_id,
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->contect
        ]);

        return redirect('admin/posts')->with('successMsg', 'You have successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where('post_id',$id)->get();
        return view('admin-panel.posts.comment',compact('comments'));
    }
    public function hideShow($CommentId){
        $comments = Comment::findOrFail($CommentId);
        $status = $comments->status == 'show' ? 'hide' :'show';
        $comments->update([
            'status'=> $status,
        ]);

        return back()->with('successMsg','Status was successfully changed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin-panel.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'contect' => 'required',
            'image' => 'nullable|image'
        ]);

        $post = Post::find($id);
        if ($request->hasFile('image')) {
            $postImage = $post->image;
            File::delete('storage/postImages/'.$postImage);
            $image = $request->image;
            $imageName = uniqid().''.$image->getClientOriginalName();
            $image->storeAs('postImages',$imageName);

            $post->update([
                'category_id' => $request->category_id,
                'image'=> $imageName,
                'title' => $request->title,
                'contect'=> $request->contect

            ]);

        }else{
            $post->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'content'=> $request->contect
            ]);
        }
        return redirect('admin/posts')->with('successMsg', 'You have successfull updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $postImage = $post->image;
        File::delete('storage/postImages/'.$postImage);
        $post->delete();

        return back()->with('successMsg','You have successfully deleted');
    }
}
