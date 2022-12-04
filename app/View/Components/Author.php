<?php

namespace App\View\Components;

use Illuminate\View\Component;

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
	public function __construct($user, $stacked = false, $followers = null)
	{
		//
		$this->user = $user;
		$this->stacked = $stacked;
		$this->followers = $followers ? $followers : collect();
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