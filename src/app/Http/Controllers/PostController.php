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
        Post::create($param);

        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        foreach($posts as $post) {
            $tmp["n"] = $post->name;
            $tmp["t"] = $post->text;
            $tmp["p"] = $post->platform->name;
            $result[] = $tmp;
        }

        $hoge["verify"] = "b81cfdf8-e09b-497d-9b15-626b9389e257";
        $hoge["response"] = "'".json_encode($result)."'";
        return response()->json($hoge);
    }

    public function get(Request $request)
    {

        $param = $request->input();
        if (!empty($param["text"])) {
            Post::create($param);
        }
        \Log::debug(print_r($param["request"], true));
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        foreach($posts as $post) {
            $tmp["n"] = $post->name;
            $tmp["t"] = $post->text;
            $tmp["p"] = $post->platform->name;
            $result[] = $tmp;
        }

        $hoge["verify"] = "b81cfdf8-e09b-497d-9b15-626b9389e257";
        $hoge["response"] = "'".json_encode($result)."'";
        return response()->json($hoge);
    }

    public function getResonite(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $result = null;
        foreach($posts as $post) {
            $result = $result.$post->name."  ".$post->platform->name."\n".$post->text."\n\n";
        }
        echo($result);
    }

}
