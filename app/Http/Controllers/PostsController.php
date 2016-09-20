<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function save(Request $request)
    {
		// set form validation rules
		$this->validate($request, [
			'title' => 'required',
			'body'	=> 'required'
		]);

		// if the validation passes, save to database and redirect
    }
}
