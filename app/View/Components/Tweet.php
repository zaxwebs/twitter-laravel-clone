<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tweet extends Component
{
	public $body;
	public $user;
	public $tweet;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $body, $tweet)
    {
		$this->user = $user;
        $this->body = $body;
		$this->tweet = $tweet;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tweet');
    }
}
