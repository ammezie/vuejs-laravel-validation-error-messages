<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::all();

    	return view('post')->with('posts', $posts);
    }

    public function save(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
    		'body'	=> 'required'
    	]);

    	Post::create([
    		'title' => $request->input('title'),
    		'body' 	=> $request->input('body'),
    	]);

    	return back()->with('message', 'Post created!');
    }
}
