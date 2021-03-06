<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
      $posts = Post::with('user', 'likes')->latest()->paginate(10);
      return view('posts.index', [
          'posts' => $posts
      ]);
  }

  public function store(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);

     $request->user()->posts()->create([
         'body' => $request->body
     ]);

     return redirect()->back()->with('message', 'post created successfully');
  }

  public function destroy(Post $post){

        $this->authorize('delete', $post);

        $post->delete();

        return back();
  }

}
