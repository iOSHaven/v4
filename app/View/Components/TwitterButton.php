<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TwitterButton extends Component
{
    private $message = "@iOSHavencom";
    private $text = "Tweet";

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = "Tweet", $message="@iOSHavencom")
    {
        $this->message = $message;
        $this->text = $text;
    }

    public function encodedUrl() {
        return "https://twitter.com/intent/tweet?text=" . urlencode($this->message);
    }

    public function text() {
        return $this->text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.twitter-button');
    }
}
