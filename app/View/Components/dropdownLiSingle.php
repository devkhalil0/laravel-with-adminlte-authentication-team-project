<?php

namespace App\View\Components;

use Illuminate\View\Component;

class dropdownLiSingle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $route;
    public $activeClass;
    public $title;

    public function __construct($route, $activeClass, $title)
    {
        $this->route = $route;
        $this->activeClass = $activeClass;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown-li-single');
    }
}
