<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FollowController extends Controller
{
	//
	public function store(Request $request, User $user)
	{
		return Redirect::back();
	}
}