<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect2Option extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id, $text, $required, $value, $keterangan, $array, $kolom;
    public function __construct($id, $text, $array=[], $required="", $value="", $keterangan=null, $kolom)
    {
        $this->id         = $id;
        $this->text       = $text;
        $this->required   = $required;
        $this->value      = (string) $value;
        $this->keterangan = $keterangan;
        $this->array      = $array;
        $this->kolom      = $kolom;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-select2-option');
    }
}
