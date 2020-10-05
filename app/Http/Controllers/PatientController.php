<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        $user = User::find(auth()->user()->id);
        $Ilness = Illness::Where("user_id",$user->id)->orderBy('created_at','asc')->get();;
        return view('patient.history',["Ilness"=>$Ilness]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("patient.makeappointment");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $IllnessData = Illness::find($id);
        return view("patient.details",["details"=>$IllnessData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function DeleteAccount(){
        $user = User::find(auth()->user()->id);
        $user->delete();
        return redirect('/');
    }

    public function showContactUs()
    {
        return view('patient.contactus');
    }
    public function showHistory()
    {
        return view('patient.history');
    }
    public function showAppointment()
    {
        return view('patient.makeappointment');
    }
    public function showDeleteAccount()
    {
        return view('patient.deleteaccount');
    }
    public function showResetPassword()
    {
        return view('patient.resetpasswordpatient');
    }




    public function showAvailableAppointments($day, $month) {
        if ($month == 10 && $day == 5)
            $reserved = [800, 900, 1000];
        else if ($month == 10 && $day == 6)
            $reserved = [1400, 1500, 1600];
        else
            $reserved = [2000, 2100, 2200];
        echo json_encode($reserved);    // Echo Available Appointments Fro Day/Month
    }

    public function removeAppointment($id, $from) {
        // Delete Appointment From DB
    }

    public function createAppointment($id, $from) {
        // Add Appointment To DB
    }


}
