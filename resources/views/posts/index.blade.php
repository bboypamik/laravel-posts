@extends('layouts.app')


@section('content')
    <x-alert/>
    <div class="container mt-4 bg-white w-75 d-flex justify-content-between">
        <div class="w-100 mt-3 mr-5">
            @if(auth()->user())
                <form action="{{route('posts')}}" method="post">
                    @csrf
                    <div class="form-group my-2">

                <textarea class="form-control" type="text" name="body" placeholder="body" rows="6"
                          value="{{old('body')}}"></textarea>

                        @error('body')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Post</button>
                </form>
            @elseif('guest')
                <div class="font-weigt-bold m-4"><h3>Please login to create posts</h3>
                    <a class="btn btn-primary" href="{{route('login')}}">Login</a>
                </div>

            @endif
        </div>
        <div class="list-group m-4 w-100">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <div class="list-group-item d-flex justify-content-between">
                        <div class=>
                            <div class="font-weight-bold m-2">{{$post->user->username}}</div>
                            <div>{{$post->created_at->diffForHumans()}}</div>
                        </div>
                        <div class="m-2">
                            {{$post->body}}

                        </div>

                        <div class=" ">


                            @auth
                                @if(!$post->likedBy(auth()->user()))
                                    <form action="{{route('like', $post)}}" method="post" class="mt-1">
                                        @csrf
                                        <button type="submit"
                                                style="border:none; background-color: transparent; ">
                                            <i class="far fa-heart fa-lg"></i></button>
                                    </form>
                                @else
                                    <form action="{{route('dislike', $post)}}" method="post" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="border: none; background-color: transparent; color: red ">
                                            <i class="fas fa-heart fa-lg"></i></button>
                                    </form>

                                @endif
                            @endauth
                            {{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}

                        </div>
                        @can('delete', $post)
                            <form action="{{route('posts.destroy', $post)}}" method="post" class="mt-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="border: none; background-color: transparent; color: black ">
                                    <i class="fas fa-times fa-lg"></i></button>
                            </form>
                            @endcan
                    </div>


                @endforeach
                <div class="pt-3">{{$posts ->links()}}</div>
            @else
                <p>There are no posts at the moment</p>
            @endif
        </div>
    </div>
@endsection

