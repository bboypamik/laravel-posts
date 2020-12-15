@extends('layouts.app')


@section('content')

    <div class="container mt-4 bg-white text-center">
        <h1>dashboard</h1>
        <div class="card-body mt-5">
            <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="file" name="image"/>
                <input type="submit" value="upload"/>
            </form>
        </div>
    </div>



@endsection
