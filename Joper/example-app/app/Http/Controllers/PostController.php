<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    protected $table = "posts";
    public function indexing(){
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function create(){
        $postsArr = [
            [
                'title' => 'title of post from VS Code',
                'content' => 'some intesting content',
                'image' => 'imageblabla.jpg',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'another title of post from VS Code',
                'content' => 'another some intesting content',
                'image' => 'another imageblabla.jpg',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach($postsArr as $item){
            Post::create($item);
        }

        dd('created');
    }

    public function update(){
        $post = Post::find(6);
        $post->update([
            'title' => 'update',
            'content' => 'update',
            'image' => 'update',
            'likes' => 1000,
            'is_published' => 0,
        ]);
        dd('updated');
    }

    public function delete(){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    //firstOrCreate
    //updateOrCreate

    public function firstOrCreate(){
        
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some title VS Code', 
        ],[
            'title' => 'some title VS Code',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        $anotherPost = [
            'title' => 'updateOrCreate some post',
            'content' => 'updateOrCreate some content',
            'image' => 'updateOrCreate some imageblabla.jpg',
            'likes' => 500,
            'is_published' => 0,
        ];

        $post = Post::updateOrCreate([
            'title' => 'title of post from VS Code'
        ],[
            'title' => 'updateOrCreate some post',
            'content' => 'updateOrCreate some content',
            'image' => 'updateOrCreate some imageblabla.jpg',
            'likes' => 500,
            'is_published' => 0,
        ]);
        dump($post->content);
        dd(22222);
    }
}
