@extends('layouts.app')


@section('content')

    <div class="container mt-4 bg-white text-center w-25 p-4 rounded">

        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" placeholder="your name" value="{{old('name')}}">

                @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" value="{{old('username')}}">
                @error('username')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{old('email')}}">
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
            <div class="form-group my-2">
                <label for="password_confirmation">Password again</label>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Repeat your password">
                @error('password_confirmation')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

@endsection
