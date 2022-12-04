<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class FollowsButton extends Component
{
	public $user;
	public $following;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(User $user, $following)
	{
		//
		$this->user = $user;
		$this->following = $following;
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