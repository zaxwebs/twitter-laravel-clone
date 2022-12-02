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
		$currentUser = Auth::user();
		if ($currentUser->isFollowing($user)) {
			$currentUser->following()->detach($user);
		} else {
			$follow = new Follow;
			$follow->user_id = $currentUser->id;
			$follow->followed_user_id = $user->id;
			$follow->save();
		}

		return Redirect::back();
	}
}