<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class FollowsButton extends Component
{
	public $user;
	public $isFollowing = false;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(User $user)
	{
		//
		$this->user = $user;
		if (auth()->check()) {
			$this->isFollowing = auth()->user()->following->contains($user);
		}
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.follows-button');
	}
}