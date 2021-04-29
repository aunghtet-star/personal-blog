<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- BOOTSTRAP CSS--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('jquery')
    <style>
        body {
            padding-top: 3px;

        }

        .sidenav {
            width: 200px;
            background: black;
            height: 100%;
            position: fixed;
            margin-top: 50px;
        }

        .sidenav a {
            display: block;
            text-decoration: none;
            font-size: 15px;
            color: white;
            padding-top: 20px;
            padding-left: 20px;

        }

        .main {
            margin-left: 220px;
            padding-top: 70px;
        }
    </style>
</head>

<body>

<div class="">
    <div class="row">
        <div class="col-md-12">
            {{--NAVIGATION BAR--}}
            <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="{{url('/')}}">Personal Blog</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-white" href="{{url('/admin/dashboard')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{Auth::user()->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <form action="{{url('/logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure to Logout')">
                                            Logout</button>
                                    </form>
                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
            {{-- SIDE BAR--}}
            <div class="sidenav ">
                <a href="{{url('/admin/users')}}">User</a>
                <a href="{{url('/admin/skills')}}">Skills</a>
                <a href="{{url('/admin/projects')}}">Projects</a>
                <a href="{{url('/admin/student_counts')}}">Students</a>
                <a href="{{url('/admin/categories')}}">Categories</a>
                <a href="{{url('/admin/posts')}}">Posts</a>

            </div>
            {{-- MAIN CONTENT--}}
            <div class="main">
                 @yield('content')
            </div>
        </div>
    </div>
</div>

{{--BOOTSTRAP JS--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>

