<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormMultipleselect2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;

    public $text;

    public $required;

    public $collection;

    public $keterangan;

    public $array;

    public $kolom;

    public function __construct($id, $text, $array, $required, $collection, $keterangan, $kolom)
    {
        $this->id = $id;
        $this->text = $text;
        $this->required = $required;
        $this->collection = $collection === null ? collect([]) : $collection;
        $this->keterangan = $keterangan;
        $this->array = $array;
        $this->kolom = $kolom;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-multipleselect2');
    }
}
