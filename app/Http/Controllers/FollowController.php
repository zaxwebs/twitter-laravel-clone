<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FollowController extends Controller
{
	//
	public function toggleFollow(Request $request, User $user)
	{

		$follow = new Follow;
		$follow->user_id = Auth::user()->id;
		$follow->followed_user_id = $user->id;
		$follow->save();

		return Redirect::back();
	}
}