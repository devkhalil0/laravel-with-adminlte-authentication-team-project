<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pageHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $data1;
     public $data2;
     public $data3;

    public function __construct($data1, $data2, $data3)
    {
        $this->data1 = $data1;
        $this->data2 = $data2;
        $this->data3 = $data3;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
