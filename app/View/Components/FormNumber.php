<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormNumber extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id, $text, $required, $value, $keterangan, $readonly, $type, $addClass, $step;
    public function __construct($id, $text, $required="", $readonly="", $value="", $type="number", $addClass="", $keterangan=null, $step="1")
    {
        $this->id         = $id;
        $this->text       = $text;
        $this->required   = $required;
        $this->value      = $value;
        $this->type       = $type;
        $this->addClass   = $addClass;
        $this->keterangan = $keterangan;
        $this->readonly   = $readonly;
        $this->step       = $step;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-number');
    }
}
