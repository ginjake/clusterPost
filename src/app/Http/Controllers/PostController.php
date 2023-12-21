<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;

class PostController extends BaseController
{
    public function cluster(Request $request)
    {

        $param = json_decode($request->input("request"), true);
        if (!empty($param["text"])) {
            Post::create($param);
        }


        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        foreach($posts as $post) {
            $tmp["n"] = $post->name;
            $tmp["t"] = $post->text;
            $tmp["p"] = $post->platform->name;
            $result[] = $tmp;
        }

        $hoge["verify"] = $param-["verifyToken"];
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

    public function postResonite(Request $request)
    {
        $saveParam = array();
        $saveParam["name"] = $request->input('name');
        $saveParam["text"] = $request->input('text');
        $saveParam["platform_id"] = 0;

        Post::create($saveParam);

        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        foreach($posts as $post) {
            $tmp["n"] = $post->name;
            $tmp["t"] = $post->text;
            $tmp["p"] = $post->platform->name;
            $result[] = $tmp;
        }
        $hoge["response"] = "'".json_encode($result)."'";
        return response()->json($hoge);
    }

}
