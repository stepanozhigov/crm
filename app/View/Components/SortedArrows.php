<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortedArrows extends Component
{
    public $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function render()
    {
        return view('crm.components.sorted-arrows');
    }
}
