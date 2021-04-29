@extends('ui-panel.master')
@section('title','user-homepage')
@section('content')

    <!-- ABOUTME AND MYSKILLS-->
    <div class="aboutme">
        <div class="row">
            <div class="col-md-5" id="about-me">
                <BR>
                <h3 class="text-center">ABOUT ME</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias animi atque dolorum quam quisquam similique sint vel voluptates voluptatibus. Ducimus harum illum maiores nostrum officiis quas quia reprehenderit voluptas.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias animi atque dolorum quam quisquam similique sint vel voluptates voluptatibus. Ducimus harum illum maiores nostrum officiis quas quia reprehenderit voluptas.</p>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="total-project">
                            <i class="fas fa-project-diagram fontawesome"></i>
                            <br>

                            <strong>{{($projects)->count()}}</strong>

                            <p>Total Project</p>
                        </div>
                    </div>


                    <div class="col-md-6 mb-2">
                        <div class="total-student">
                            <i class="fa fa-users fontawesome"></i>
                            <br>
                            @if($studentCount)
                            <strong>{{ $studentCount->count }}</strong>
                            @endif
                            <p>Total Students</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <br>
                <h3 class="text-center " id="skills">MY SKILLS</h3>
                @foreach($skills as $skill)
                <div class="row mb-3">
                    <div class="col-md-9">
                        <div class="progress mt-2">
                            <div class="progress-bar" style=" width:{{$skill->percent}}% ;">
                                {{$skill->percent}} %
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">{{$skill->name}}</div>
                </div>
                @endforeach
                {{$skills->links()}}
            </div>
        </div>
    </div>
    <!--MY PROJECTS -->
    <div class="project">
        <br><br>
        <hr>
        <h3 class="text-center">MY PROJECTS</h3>
        <div class="row">
            @foreach($projects as $project)
            <div class="col-md-4 mb-2">
                <a href="{{$project->url}}" target="_blank" style="text-decoration: none">
                    <div class="single-project">
                        <i class="fas fa-project-diagram fontawesome"></i><br><br>
                        <strong>{{$project->name}}</strong>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>

    <!--LATEST POSTS-->
    <br>
    <hr>
    <div class="latest-post">
        <h3 class="text-center ">LATEST POSTS FROM BLOGS</h3>
        <br>
        <p class="text-center text-info">Hey guys!Welcome to my blog.I'm glad to see you.My blog is interesting and exciting for you,I think.So to watch my blog under go links.</p>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-sm-6 col-md-4 ">
                <div class="card  bg-dark mb-2">
                    <a href="{{'posts/'.$post->id.'/details'}}" style="text-decoration: none">
                        <img src="{{asset('storage/postImages/'.$post->image)}}" alt=""><br>
                        <small>{{date('d-M-Y',strtotime($post->created_at))}}</small>
                        <br><br>
                        <h5>{{$post->title}}</h5>
                        <p>{{substr($post->content,0,150)}}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
