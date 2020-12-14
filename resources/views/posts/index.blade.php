@extends('layouts.app')


@section('content')
    <x-alert/>
    <div class="container mt-4 bg-white w-75 d-flex justify-content-between">
        <div class="w-100 mt-3 mr-5">
            @if(auth()->user())
                <form action="{{route('post')}}" method="post">
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
                    <button class="btn btn-primary" type="submit">Submit</button>
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
                        <div class="font-weight-bold m-2">{{$post->user->username}}</div>
                        <div class="m-2">
                            {{$post->body}}
                            <div>
                                @if(!$post->likedBy(auth()->user()))
                                <form action="{{route('post.likes', $post)}}" method="post" class="mt-1">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Like</button>
                                </form>
                                @else
                                    <form action="{{route('post.likes', $post)}}" method="post" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning">Unlike</button>
                                    </form>

                                @endif
                            </div>
                        </div>
                        <div class="m-2">{{$post->created_at->diffForHumans()}}</div>
                        <div>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</div>
                    </div>


                @endforeach
                <div class="pt-3">{{$posts ->links()}}</div>
            @else
                <p>There are no posts at the moment</p>
            @endif
        </div>
    </div>
@endsection

