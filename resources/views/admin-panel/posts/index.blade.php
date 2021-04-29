@extends('admin-panel.master')
@section('title','project index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Posts</div>
                        </div>
                        <div class="col-md-6"><a href="{{url('admin/posts/create')}}" class="float-end btn btn-primary btn-sm">
                                <i class="fa fa-plus-circle"></i> Add new</a></div>
                    </div>

                </div>
                <div class="card-body">
                    @if(session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="mb-0">{{Session('successMsg')}}</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category_id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    <img src="{{asset('/storage/postImages/'.$post->image)}}" width="100px" alt="">
                                </td>
                                <td>{{$post->title}}</td>
                                <td><textarea readonly>{{$post->content}}</textarea></td>
                                <td>
                                    <form action="{{url('admin/posts/'.$post->id)}} " method="post">
                                        @csrf @method('delete')
                                        <a class="btn btn-primary btn-sm" href="{{url('admin/posts/'.$post->id.'/edit')}} ">
                                            <i class="far fa-edit"></i>Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i> Delete</button>
                                        <a href="{{url('/admin/posts/'.$post->id)}}" class="btn btn-info btn-sm" ><i class="fa fa-comments"></i>comments</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="card-footer ">
                    <div class="m-3 float-end">
                        {{$posts->links()}}
                    </div>


                </div>
            </div>


        </div>
    </div>
</div>
@endsection
