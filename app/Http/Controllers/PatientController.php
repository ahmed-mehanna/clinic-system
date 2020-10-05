<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $dateTimeFrom =  Carbon::today(); //year / month/ day
        $dateTimeFrom->month = $month;
        $dateTimeFrom->day = $day;
        $dateTimeFrom->addHours(8);

        $dateTimeTo = clone $dateTimeFrom;
        $dateTimeTo->addHours(14);

        $reservedobj = Reservation::whereBetween('reservation At',[$dateTimeFrom->toDateTime(),$dateTimeTo->toDateTime()])->get();

        $reserved = array();
        foreach ($reservedobj as $res){
             $first = Carbon::parse($res["reservation At"])->format('Hi');
             array_push($reserved,$first);
        }
        $reserved = [900, 1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100];
        echo json_encode($reserved);    // Echo Available Appointments Fro Day/Month
    }

    public function removeAppointment($id, $from) {
        // Delete Appointment From DB
    }

    public function createAppointment($id, $from) {
        // Add Appointment To DB
    }

    public function showMyAppointments() {
        $myAppointments = [
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '900',
                'to'    =>  '930'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '1400',
                'to'    =>  '1430'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '1500',
                'to'    =>  '1530'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '1600',
                'to'    =>  '1630'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '1700',
                'to'    =>  '1730'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '1800',
                'to'    =>  '1830'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '1900',
                'to'    =>  '1930'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '2000',
                'to'    =>  '2030'
            ],
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '2100',
                'to'    =>  '2130'
            ]
        ];
        echo json_encode($myAppointments);
    }

}
