<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownLi extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $dropdownActive;
    public $title;
    public $dropdownAmount;

    public function __construct($dropdownActive, $title, $dropdownAmount)
    {
        $this->dropdownActive = $dropdownActive;
        $this->title = $title;
        $this->dropdownAmount = $dropdownAmount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown-li');
    }
}
