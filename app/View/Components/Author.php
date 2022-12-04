<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Author extends Component
{
	public $user;
	public $stacked;
	public $followers;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(User $user, bool $stacked = false, ? Collection $followers = null)
	{
		//
		$this->user = $user;
		$this->stacked = $stacked;
		$this->followers = $followers ?? collect();
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.author');
	}
}