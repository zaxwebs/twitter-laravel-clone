<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class HomeController extends Controller
{
    //
	public function index()
    {
		$tweets = Tweet::latest()->limit(40)->with(['user', 'tweets' => ['user']])->get();
		return view('area51', compact('tweets'));
    }
}
