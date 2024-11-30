<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $messages;

    public function __construct($type = null, $messages = null)
    {
        $this->type = $type;
        $this->messages = $messages;
    }

    public function render()
    {
        return view('components.alert');
    }
}