<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $dataList;
    public $tableTitle;

    public function __construct($dataList, $tableTitle)
    {
        $this->dataList = $dataList;
        $this->tableTitle = $tableTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-table');
    }
}
