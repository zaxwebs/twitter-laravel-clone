<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FollowController extends Controller
{
	//
	public function store(Request $request, User $user)
	{
		Auth::user()->following()->attach($user);
		return Redirect::back();
	}
}