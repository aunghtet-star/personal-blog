<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>@yield('title')</title>
</head>

<body>
<div class="container-fluid">
    <div class="col-md-12">
        <!-- HEADER SECTION-->
        <div class="header">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <img src="/images/me1.jpg" id="header-img" alt="">
                </div>
                <div class="col-md-4">
                    <br>
                    <p>Hello</p>
                    <p>Welcome to my blog</p>
                    <p>AUNG HTET</p>
                    <p>The Happy Coder</p>
                    <br>
                    <a href={{url('/posts')}}>
                        <button class="btn btn-info">
                            <i class="fa fa-plus-circle"></i>
                            Explore My Blogs
                        </button>
                    </a>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!--NAVIGATION SECTION-->
        <div id="navbar" class="position-sticky bg-dark">
            <a href="{{'/'}}">Home</a>
            <a href="{{'/posts'}}">Blog</a>
            @if(Auth::check())
                <a href="" class="float-end"  onclick="event.preventDefault();
                    if(confirm('Are you sure')){document.getElementById('logout-form').submit()}" >Logout </a>
                <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display:none">
                    @csrf
                </form>
                <a href="" class="float-end">{{strtoupper(Auth::user()->name)}}</a>
            @else
                <a href="{{url('/register')}}" class="float-end">REGISTER</a>
                <a href="{{url('/login')}}" class="float-end">LOGIN</a>
            @endif

        </div>


        <div class=" container">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- FOOTER SECTION-->
        <br>
        <div class="footer ">
            <div class="row">
                <div class="col-md-4 f-column">
                    <h5 class="text-center">About Website</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur cumque delectus eos ex explicabo magnam magni nostrum voluptate.
                        Aliquam asperiores dolores ea labore laborum laudantium nihil porro ratione ut voluptatum?</p>
                </div>
                <div class="col-md-4 s-column">
                    <h5 class="text-center">Contact me</h5>
                    <br>
                    <p>PHONE : 09968387383</p>
                    <p>EMAIL : aunghtet@gmail.com</p>
                </div>
                <div class="col-md-4 t-column">
                    <h5 class="text-center">Follow me</h5>
                    <br>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!--CUSTOM JS-->
    <script src="js/script.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
    crossorigin="anonymous"></script>-->

</body>

</html>

