<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PatientClinicHistoryDetails extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $illness;

    public function __construct($illness)
    {
        $this->illness = $illness;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.patient-clinic-history-details');
    }
}
