<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;

class PostController extends BaseController
{

    public function post(Request $request)
    {
        $param = $request->input();
        print_r($param);
    }

    public function get(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        foreach($posts as $post) {
            $tmp["n"] = $post->name;
            $tmp["t"] = $post->text;
            $tmp["p"] = $post->platform->name;
            //$tmp["d"] = $post->created_at;
            $result[] = $tmp;
        }
        return response()->json($result);
    }
}
