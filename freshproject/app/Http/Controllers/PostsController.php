<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostsController extends Controller{

    public function show($slug){

        //$post = DB::table('posts')->where('slug',$slug)->first();
        $post = Post::where('slug',$slug)->first();

        return view('post',[
            'boss' => $post
        ]);    }
}
