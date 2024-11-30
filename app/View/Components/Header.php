<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    
    public $menus;
    
    public function __construct()
    {
        $this->menus = Menu::with('children')->whereNull('parent_id')->orderBy('position')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header', ['menus' => $this->menus]);
    }
}
