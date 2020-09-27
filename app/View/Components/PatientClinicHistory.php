<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PatientClinicHistory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $patientHistory;

    public function __construct($patientHistory)
    {
        $this->patientHistory = $patientHistory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.doctor-dashboard.patient-clinic-history');
    }
}
