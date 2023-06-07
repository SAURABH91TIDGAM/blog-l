<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
     {

        //dd($post);

        //dd(request()->all());

            request()->validate([
                'body' => 'required',
                ]);

        $post->comments()->create([
             'user_id' => request()->user()->id,
             'body' => request('body')
         ]);

         return back();
     }

    // public function store(Post $post, Request $request)
    // {
    //     //dd($post);dd(request()->all());

    //     request()->validate([
    //         'body' =>'required',
    //     ]);

    //     $post->comments()->create([
    //         'user_id' => $request->post->user->id(),
    //         'body' => $request->input('body')
    //     ]);

    //     return back();
    // }


}
