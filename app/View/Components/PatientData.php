<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PatientData extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name, $id, $age;

    public function __construct($name, $id, $age)
    {
        $this->name = $name;
        $this->id = $id;
        $this->age = $age;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.doctor-dashboard.patient-data');
    }
}
