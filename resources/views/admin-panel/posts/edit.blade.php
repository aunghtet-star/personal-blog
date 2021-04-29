@extends('admin-panel.master')
@section('title','posts edit')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Posts Edit</div>
                </div>
                <form action="{{'/admin/posts/'.$post->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Category_id</label><br>
                            <select name="category_id" id="" class="form-select">
                                <option value="">Select One</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        {{$post->category_id == $category->id ? 'selected' :''}}
                                >{{$category->name}}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="">Images</label><br>
                            <input type="file" name="image"  class=" @error('image') is-invalid @enderror mb-2"><br>
                            <img src="{{asset('/storage/postImages/'.$post->image)}}" style="width: 100px;border: 1px solid gray" alt="">
                            @error('image')
                            <span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{old('title') ?? $post->title }}" placeholder="Title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea type="text" name="contect" placeholder="content" rows="4" class="form-control
                                @error('contect') is-invalid @enderror">{{old('content') ?? $post->content}}</textarea>
                            @error('contect')
                            <span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
