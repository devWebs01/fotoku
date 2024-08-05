<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id, $text, $required, $value, $keterangan;
    public function __construct($id, $text, $required="", $value="", $keterangan=null)
    {
        $this->id         = $id;
        $this->text       = $text;
        $this->required   = $required;
        $this->value      = (string) $value;
        $this->keterangan = $keterangan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-select2');
    }
}
