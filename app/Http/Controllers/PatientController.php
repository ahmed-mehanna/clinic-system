<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Patient;
use App\Models\PatientHistory;
use App\Models\Patientturn;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Exception_Days_Doctor;
use Illuminate\Support\Facades\Hash;
use App\Models\Illness;
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

        $datenow = Carbon::now();
        $res_check_for_duplicate= Reservation::firstWhere("Reserved_by_Doctor",1);
        $res_check2_for_duplicate= Reservation::whereBetween('reservation At',[Carbon::today()->toDateTime(),Carbon::today()->addHours(22)->toDateTime()])->where('Reserved_by_Doctor',1)->orderBy('reservation At','DESC')->get();

        if($res_check_for_duplicate) {
            $start = clone Carbon::parse($res_check2_for_duplicate[0]["reservation At"]);
            for($date = clone $start;$date->diffInMinutes($datenow)>="30";$date->addMinutes(30)){
                $date->addMinutes(30);
                $res = new Reservation();
                $res["reservation At"] = $date;
                $res["user_id"] = 0;
                $res["Reserved_by_Doctor"] = 1 ;
                $res->save();
            }
        }elseif(!$res_check_for_duplicate){
            $start = clone Carbon::today();
            $start->addHours(8);

            for($date = clone $start;$date->diffInMinutes($datenow)>"30";$date->addMinutes(30)){
                $res = new Reservation();
                $res["reservation At"] = $date;
                $res["user_id"] = 0;
                $res["Reserved_by_Doctor"] = 1 ;
                $res->save();
            }
        }
        $reservedobj = Reservation::whereBetween('reservation At',[$dateTimeFrom->toDateTime(),$dateTimeTo->toDateTime()])->get();

        $reserved = array();
        foreach ($reservedobj as $res){
            $first = Carbon::parse($res["reservation At"])->format('Hi');
            $first = (int)$first;
            array_push($reserved,$first);
        }
        $reserved = [1300,1400];
        echo json_encode($reserved);    // Echo Available Appointments Fro Day/Month
    }

    public function removeAppointment($day, $month, $from) {
        // Delete Appointment From DB

        $user = User::find(auth()->user()->id);
        $dateTimeFrom =  Carbon::today(); // min //hour// day // month // year
        $hourMin = $from;
        $hour = $from /100 ;
        $min = $from%100;

        $dateTimeFrom->addMinutes($min);
        $dateTimeFrom->addHours($hour);
        $dateTimeFrom->day = $day;
        $dateTimeFrom->month = $month;

        $reserveCheck= Reservation::where("user_id",$user["id"])->where("reservation At", $dateTimeFrom->toDateTime())->get();
        if($reserveCheck)
        {
            $reserveCheck[0]->delete();
        }
    }

    public function createAppointment($day, $month, $from) {
        // Add Appointment To DB
            // 930
        $user = User::find(auth()->user()->id);
        $dateTimeFrom =  Carbon::today(); // min //hour// day // month // year
        $hourMin = $from;
        $hour = $from /100 ;
        $min = $from%100;

        $dateTimeFrom->addMinutes($min);
        $dateTimeFrom->addHours($hour);
        $dateTimeFrom->day = $day;
        $dateTimeFrom->month = $month;

        echo $dateTimeFrom ;
        $reserve = new Reservation();
        $reserve["reservation At"] = $dateTimeFrom ;
        $reserve["user_id"] = $user->id;
        $reserve->save();
    }

    public function showMyAppointments() {
        $reserve = Reservation::all();
        foreach ($reserve as $res){
            $resvation = Carbon::parse($res["reservation At"]);
            //echo $resvation->toFormattedDateString();
            echo $resvation->hour;
        }
        $myAppointments = [
            [
                'date'  =>  date("F d, Y"),
                'from'  =>  '900',
                'to'    =>  '930'
            ]
        ];
        echo json_encode($myAppointments);
    }

}
