<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    {{-- FONTAWSOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <style>
    body{
        padding:3px;
    }
    .navbar{
        z-index: 5;
        position:fixed;
        top:0;
    }
    .sidenav{
        background-color:black;
        width:200px;
        height:100%;
        position:fixed;
        padding:15px;
        
    }
    .sidenav a{
        display:block;
        padding:6px;
        color:white;
        font-size:20px;
        text-decoration:none;
    }
    .main{
        margin-left:200px;
        padding:20px;   
        font-size:18x;
        text-align: justify;
    }
    </style>
</head>
<body>
   <div class="container-fluid">
   <div class="row">
   <div class="col-md-12">
<!-- NAVATION BAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark position-sticky">
        <a class="navbar-brand text-white" href="{{url('/')}}">Personal Blog Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure to Logout')">Logout</button>
                </form>
                
            
            </div>
                </li>
            </ul>
            </div>
        </nav>
<!-- SIDE BAR -->
        <div class="sidenav">
        <a href="{{url('admin/user')}}">User</a>
        <a href="{{url('admin/skill')}}">Skill</a>
        <a href="{{url('admin/project')}}">Project</a>
        <a href="{{url('admin/student')}}">Student</a>
        <a href="{{url('admin/category')}}">Category</a>
        <a href="{{url('admin/post')}}">Post</a>
        </div>
<!-- MAIN CONTENT -->
    <div class="main">
        @yield('content')
    </div>
        
        
</div>
    </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @yield('javascript')
</body>
</html>

