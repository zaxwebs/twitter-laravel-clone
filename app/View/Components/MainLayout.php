<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainLayout extends Component
{
	public $composer;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($composer = true)
	{
		//
		$this->composer = $composer;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('layouts.main');
	}
}