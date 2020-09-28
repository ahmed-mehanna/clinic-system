<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function patientDashboard() {
        return redirect("/dashboard/user/");
    }

//    public function nurseDashboard() {
//        return view('pages.nurse-dashboard');
//    }

//    public function nurseReserve() {
//        return view('pages.nurse-reserve');
//    }

//    public function nurseWorkHourException() {
//        return view('pages.nurse-work-hour-exception');
//    }

    public function doctorDashboard() {
        return view('pages.doctor-dashboard');
    }


}
