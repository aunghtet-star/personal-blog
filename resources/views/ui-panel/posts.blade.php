@extends('ui-panel.master')
@section('title','blogpost')
@section('content')
    <!--Blog Post-->
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
          <div class="blog">
            <img src="{{asset('storage/postImages/'.$post->image)}}" alt="">
            <h4>{{$post->title}}</h4>
              <p>{{substr($post->content,0,150)}}</p>
            <button class="btn btn-info"><a href="{{'posts/'.$post->id.'/details'}}">Read more </a><i class="fa fa-forward"></i></button>
          </div>
            @endforeach
        </div>
            {{$posts->links()}}
        <!--side bar-->

        <div class="col-md-4">
          <div class="sidebar">
            <form action={{url('/search_data')}} method="post">
                @csrf
              <div class="input-group">
                <input type="text" name="search_data" class="form-control" placeholder="search....">
                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Search</button>
              </div>
            </form>
            <hr>
            <h6>Categories</h6>
            <ul>
                @foreach($categories as $category)
              <li><a href="{{url('/searchCategories/'.$category->id)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>

          </div>
        </div>
      </div>


    </div>

@endsection
