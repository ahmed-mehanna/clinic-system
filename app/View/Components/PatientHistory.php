<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PatientHistory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $history;

    public function __construct($history)
    {
        $this->history = $history;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.doctor-dashboard.patient-history');
    }
}
