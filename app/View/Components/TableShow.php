<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableShow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;

    public $thtd;

    public function __construct($id = null, $thtd = null)
    {
        $this->id = $id;
        $this->thtd = $thtd === null ? [] : $thtd;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table-show');
    }
}
