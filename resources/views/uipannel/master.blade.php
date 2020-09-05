<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- HEADER SECTION -->
                <div class="header">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4"><img src="{{asset('images/profile1.jpg')}}" id="header-img" alt="">
                        </div>
                        <div class="col-md-4"><br>
                            <p>Hello</p>
                            <p>Welcome From</p>
                            <p>K Khine</p>
                            <p>Messy girl</p>
                            <a href="{{url('/post')}}"><button class="btn btn-info"><i class="fa fa-plus-circle aria-hidden='true'"></i>Explore My Blogs</button></a>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <div class='position-sticky'  id="navbar">
                    <a href="{{url('/')}}">HOME</a>
                    <a href="{{url('/post')}}">BLOGS</a>
                    @if(Auth::check())
                    <a href="{{url('/register')}}" class="float-right">
                        {{strToUpper(Auth::user()->name)}}
                    </a>
                    <a href="{{url('/login')}}" class="float-right" onclick="event.preventDefault();document.getElementById('logout-form').submit()">LOGOUT</a>
                    <form action="{{route('logout')}}" method="POST" style="display: none" id="logout-form">
                        @csrf
                    </form>
                    @else
                    <a href="{{url('/register')}}" class="float-right">REGISTER</a>
                    <a href="{{url('/login')}}" class="float-right">LOGIN</a>
                    @endif
                </div>
                @yield('content')
            <!-- FOOTER SECTION -->
            <div class="footer">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <h5>ABOUT THIS WEBSITE</h5>
                        <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias alias saepe libero omnis ullam quisquam, sed nam vitae a quo tempore, culpa reprehenderit suscipit dicta natus velit nobis repellat? Repudiandae.</P>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5>CONTACT INFO</h5>
                        <p>Phone:</p>
                        <p>Address:</p>
                        <p>Email:</p>
                    </div>
                    <div class="col-md-4">
                        <h5>FOLLOW ME ON</h5>
                        <a href="#" target="blank" ><i class="fa fa-users media-icon"></i></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" target="blank"><i class="fa fa-phone media-icon" ></i></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" target="blank"><i class="fa fa-book media-icon"></i></a>
                    </div>
                </div>
            </div> 
            
            </div>
        </div>
    </div>

    
    <!--BOOTSTRAP JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- CUSTOM JS -->
    <script src="{{asset('js/script.js')}}"></script>


</body>
</html>