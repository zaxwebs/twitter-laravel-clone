<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tweet extends Component
{
	public $user;
	public $body;
	public $image;
	public $tweet;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $body, $image, $tweet)
    {
		$this->user = $user;
        $this->body = $body;
		$this->image = $image;
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
