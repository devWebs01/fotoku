<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputRupiah extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;

    public $text;

    public $required;

    public $value;

    public $keterangan;

    public $readonly;

    public function __construct($id, $text, $required = '', $readonly = '', $value = '', $keterangan = null)
    {
        $this->id = $id;
        $this->text = $text;
        $this->required = $required;
        $this->value = $value;
        $this->keterangan = $keterangan;
        $this->readonly = $readonly;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input-rupiah');
    }
}
