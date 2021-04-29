@extends('ui-panel.master')
@section('title','detail')
@section('content')
       <!--Detail Post-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="detail-post">
                        <img src="{{asset('storage/postImages/'.$posts->image)}}" alt=""><br><br>
                        <i class="fas fa-calendar-minus"><small> {{ date('d-M-Y',strtotime($posts->created_at)) }} </i></small><br><br>
                        <h5>{{$posts->category->name}}</h5>
                        <p>{{$posts->content}}</p>

                        <form  method="post">
                            @csrf
                            <div>
                                <span>{{$likes->count()}}Likes</span> &nbsp;&nbsp;&nbsp;
                                <span>{{$dislikes->count()}}Unlikes</span> &nbsp;&nbsp;
                                <span>{{$comments->count()}}comments</span>
                            </div>
                            <button type="submit" formaction="{{url('/post/like/'.$posts->id)}}" class="btn btn-primary btn-sm"
                                    @if($likeStatus)
                                   @if($likeStatus->type == 'like')
                                       disabled
                                   @endif
                                       @endif
                            ><i class="far fa-thumbs-up"></i> Like </button>
                            <button type="submit" formaction="{{url('/post/dislike/'.$posts->id)}}"
                                    @if($likeStatus)
                                    @if($likeStatus->type == 'dislike')
                                    disabled
                                    @endif
                                    @endif
                            class="btn btn-danger btn-sm"><i class="far fa-thumbs-down"></i> unLike </button>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="collapse" data-bs-target="#comment-id"><i class="far fa-comment-alt"></i> Comments </button>
                        </form>

                        <div class="collapse comment-section mt-2 " id="comment-id">
                            <form action="{{url('/post/comment/'.$posts->id)}}" method="post" >
                                  @csrf
                                <textarea name="comment" required id="" cols="29" rows="3" placeholder="comment...." class="form-check"></textarea><br>
                                <button class="btn btn-info btn-sm" type="submit"><i class="far fa-paper-plane"></i>  comment</button>
                            </form>
                            @foreach($comments as $comment)
                            <div class="message-box">
                                <img src="/images/user.png" alt="">
                                <p><strong>{{$comment->user->name}}</strong><br>{{$comment->text}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
 @endsection


