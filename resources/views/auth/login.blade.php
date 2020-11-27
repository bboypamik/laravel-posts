@extends('layouts.app')


@section('content')

    <div class="container mt-4 bg-white text-center w-25 p-4 rounded">
        <x-alert/>
        <form action="{{route('login')}}" method="post">
            @csrf

            <div class="form-group my-2">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="E-mail" value="">
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Choose your password">
            </div>
            @error('password')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
            <div class=" my-2">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>


            <button class="btn btn-primary mt-2">Login</button>
        </form>
    </div>

@endsection
