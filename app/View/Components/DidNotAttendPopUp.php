<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DidNotAttendPopUp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.nurse-dashboard.did-not-attend-pop-up');
    }
}
