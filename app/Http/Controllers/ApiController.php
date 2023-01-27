<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ApiController extends Controller
{
    public function index(){
        return Post::all();
    }
    public function store(){
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]); 
    
        return Post::create([
            'title'=>request('title'),
            'content'=>request('content'),
        ]);
    }
    public function update(Post $post){

        request()->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $succuss =  $post->update([
            'title'=>request('title'),
            'content'=>request('content'),
        ]);
        return [
            'success'=> $succuss
        ];


    }

    public function delete(Post $post){
        $succuss = $post->delete();
        return [
            'success'=>$succuss
        ];
    }
}
