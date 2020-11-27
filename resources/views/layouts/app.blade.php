<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="bg-secondary navbar navbar-dark d-flex justify-content-between">
    <div class=" d-flex justify-content-between">
        <div class="p-2">
            <a class ="btn btn-light" href="{{route('home')}}">Home</a>
        </div>
        <div class="p-2">
            <a class="btn btn-light" href="{{route('dashboard')}}">Dashboard</a>
        </div>
        <div class="p-2">
            <a class="btn btn-light" href="">Posts</a>
        </div>
    </div>

    <div class=" d-flex justify-content-between">
        @auth
        <div class="p-2">
            <a class=" btn btn-light" href="">{{Auth()->user()->username}}</a>
        </div>

        <div class="p-2">
            <form action="{{route('logout')}}" method="post">
                @csrf
            <button type="submit" class="btn btn-light">Logout</button>
            </form>
        </div>
        @endauth
        @guest
                <div class="p-2">
            <a class="btn btn-light" href="{{route('login')}}">Login</a>
        </div >
        <div class="p-2">
            <a class=" btn btn-light" href="{{route('register')}}">Register</a>
        </div>
            @endguest
    </div>

</nav>



@yield('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>
