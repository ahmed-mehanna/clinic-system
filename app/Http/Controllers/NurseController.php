<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Patient;
use App\Models\PatientHistory;
use App\Models\Patientturn;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Exception_Days_Doctor;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class NurseController extends Controller
{

    public static function index()
    {
        return view('pages.nurse-dashboard');
    }

    public function reservations() {
        $reservations = Reservation::whereBetween('reservation At',[Carbon::today()->toDateTime(),Carbon::today()->addHours(22)->toDateTime()])->where('Reserved_by_Doctor',0)->orderBy('reservation At','asc')->get();
        foreach ($reservations as $reservation) {
            $reservation['name'] = $reservation->user->name;
            $reservation['from'] = Carbon::parse($reservation["reservation At"])->format('g:i A');
            $reservation['to'] = Carbon::parse($reservation["reservation At"])->addMinutes(30)->format('g:i A');
        }
        echo json_encode($reservations);
    }

    public function createReserve()                                    // nurseReserve
    {
        return view('pages.nurse-reserve');
    }

    public function createWorkHourException()                           // nurseReserve
    {
        return view('pages.nurse-work-hour-exception');
    }

    public function store(Request $request)
    {
        $request->validate([
            "first-name"=>"required",
            "middle-name"=>"required",
            "last-name"=>"required",
            "password"=>"required",
            "phone-number"=>"required",

            "national-id"=>"required",
            "address"=>"required",
            "age"=>"required",
            "gender"=>"required",

            "time"=>"required",
            "day"=>"required",
            "month"=>"required",
        ]);

        $patient = new Patient();
        $patient2 = new Patient();
        $reserv = new Reservation();
        $user = new User();
        $userhistory = new PatientHistory();
        $patient2 = Patient::firstWhere("national-id", $request->input("national-id"));
        if($patient2 === null) {
            $user["name"] = $request["first-name"] . " " . $request["middle-name"] . " " . $request["last-name"];
            if($request->input("email") === null){
                $user["email"] = "example@gmail.com";
            }else{
                $user["email"] = $request->input("email");
            }
            $user["phoneNumber"] = $request["phone-number"];
            $user["password"] = Hash::make($request["national-id"]);
            $user["PatientForum"]=1;
            $user->save();

            $patient["national-id"] = $request->input("national-id");
            $patient["address"] = $request->input("address");
            $patient["age"] = $request->input("age");

            $patient["gender"] = $request->input("gender");
            $patient["user_id"] = $user->id;
            $patient->save();

            $res = Carbon::today();
            $res->day = $request->input("day");
            $res->month = $request->input("month");
            $hour = (int)$request->input("time") / 100;
            $min = (int)$request->input("time") % 100;
            $res->addHours($hour);
            $res->addMinutes($min);

            $userhistory["user_id"]=$user->id;
            $userhistory->save();

            $resveCheck = Reservation::firstWhere("reservation At",$res->toDateTimeString());
            if(!$resveCheck){
                $reserv["reservation At"] = $res;
                $reserv["user_id"] = $user->id;
                $reserv["Reserved_by_Doctor"] = 0;
                $reserv->save();
            }else{
                return redirect()->back()->with('message', 'This Appointments is Aleardy reserved');
            }
        }else{

            $dateTimeFrom1 = Carbon::today();
            $dateTimeFrom1->day = $request->input("day");
            $dateTimeFrom1->month = $request->input("month");
            $From= clone $dateTimeFrom1;
            $To = clone $dateTimeFrom1;

            $hour = (int)$request->input("time") / 100;
            $min = (int)$request->input("time") % 100;
            $dateTimeFrom1->addHours($hour);
            $dateTimeFrom1->addMinutes($min);

            $isreserved = Reservation::where("user_id",$patient2["user_id"])->whereBetween('reservation At',[$From->toDateTime(),$To->addHours(22)->toDateTime()])->get();
            $resveCheck = Reservation::firstWhere("reservation At",$dateTimeFrom1->toDateTimeString());
            // check
            if(count($isreserved)===0) {
                if (!$resveCheck) {
                    $reserv["reservation At"] = $dateTimeFrom1;
                    $reserv["user_id"] = $patient2->user_id;
                    $reserv["Reserved_by_Doctor"] = 0;
                    $reserv->save();
                } else {
                    return redirect()->back()->with('message', 'This Appointments is Aleardy reserved');
                }
            }else{
                return redirect()->back()->with('message', 'You Are Aleardy Reserved an Appointment At This Day');
            }

        }

        return  redirect("/nurse");
    }

    public function update(Request $request)
    {
        set_time_limit(500);
        $request->validate([
            "From_That_dayTime"=>"required",
            "To_that_Daytime"=>"required",
        ]);
        $reserv = new Reservation();
        $reserv2 = new Reservation();
        $from_That_dayTime = Carbon::parse($request->input("From_That_dayTime"));
        $from_That_dayTime->minute = 0;
        $to_That_dayTime = Carbon::parse($request->input("To_that_Daytime"));
        $to_That_dayTime->addHours(1);

        $period = CarbonPeriod::between($from_That_dayTime,$to_That_dayTime);

            foreach ($period as $x)
            {
                if($from_That_dayTime->diffInDays($to_That_dayTime) == "0"){
                    for($date = clone $from_That_dayTime ; $date->diffInMinutes($to_That_dayTime) >"30";$date->addMinutes(30)){

                        $check = Reservation::firstWhere("reservation At", $date->toDateTimeString());
                        if ($check === null) {
                            $res = new Reservation();
                            $res["reservation At"] = $date;
                            $res["user_id"] = 0;
                            $res["Reserved_by_Doctor"] = 1;
                            $res->save();
                        }else{
                            $check->delete();
                            $res = new Reservation();
                            $res["reservation At"] = $date;
                            $res["user_id"] = 0;
                            $res["Reserved_by_Doctor"] = 1;
                            $res->save();

                        }
                    }
                }else{
                    for($date = clone $x ; $date->diffInMinutes($to_That_dayTime) >"30";$date->addMinutes(30)){
                        $check = Reservation::firstWhere("reservation At", $date->toDateTimeString());
                        if ($check === null) {
                            $res = new Reservation();
                            $res["reservation At"] = $date;
                            $res["user_id"] = 0;
                            $res["Reserved_by_Doctor"] = 1;
                            $res->save();
                        }else{
                            $check->delete();
                            $res = new Reservation();
                            $res["reservation At"] = $date;
                            $res["user_id"] = 0;
                            $res["Reserved_by_Doctor"] = 1;
                            $res->save();
                        }
                    }
                }
            }
//        $reserv["reservation At"] = $from_That_dayTime ;
//        $reserv["user_id"] = 0 ;
//        $reserv["TO_Expection"] = 0 ;
//        $reserv["Reserved_by_Doctor"] = 1 ;
//
//
//        $to_That_dayTime = Carbon::parse($request->input("To_that_Daytime"));
//        $reserv2["reservation At"] = $to_That_dayTime ;
//        $reserv2["user_id"] = 0 ;
//        $reserv2["TO_Expection"] = 1 ;
//        $reserv2["Reserved_by_Doctor"] = 1 ;


        return redirect('/nurse');

    }

    public function destroy($id)
    {
        //
    }

    public function CheckAttend($id){
        $user = User::find($id);
        $user->patient->Attend =  $user->patient->Attend + 1 ;
        $patient_turn = new Patientturn();
        $patient_turn['user_id'] = $user->id;
        $reservation = Reservation::where("user_id",$user["id"])->whereBetween('reservation At',[Carbon::today()->toDateTime(),Carbon::today()->addHours(22)->toDateTime()])->get();
        if(count($reservation)===0) {
        }elseif(count($reservation)!=0){
            $patient_turn->save();
            $reservation[0]->delete();
        }
        return redirect('/nurse');
    }
    public function CheckNotAttend($id){
        $user = User::find($id);
        if($user->patient->Attend != 0) {
            $user->patient->Attend = $user->patient->Attend - 1;
        }
        $reservation = Reservation::where("user_id",$user["id"])->whereBetween('reservation At',[Carbon::today()->toDateTime(),Carbon::today()->addHours(22)->toDateTime()])->get();
        if(count($reservation)!=0) {
            $reservation[0]->delete();
        }
        return redirect('/nurse');
    }

    public function showAvailableAppointments($day, $month) {
        $dateTimeFrom =  Carbon::today(); //year / month/ day
        $dateTimeFrom->month = $month;
        $dateTimeFrom->day = $day;
        $dateTimeFrom->addHours(8);
        $dateTimeTo = clone $dateTimeFrom;
        $dateTimeTo->addHours(14);


        $datenow = Carbon::now();
        $start = clone Carbon::today();
        $start->addHours(8);
        $today = clone $start;
//        if($start->isPast()) {
//            for ($date = clone $start; $date->diffInMinutes($datenow) >= "30"; $date->addMinutes(30)) {
//                $check = Reservation::firstWhere("reservation At", $date->toDateTimeString());
//                if ($check === null) {
//                    $res = new Reservation();
//                    $res["reservation At"] = $date;
//                    $res["user_id"] = 0;
//                    $res["Reserved_by_Doctor"] = 1;
//                    $res->save();
//                }
//                $today = $date;
//            }
//            $end = clone $today;
//            $check2 = Reservation::firstWhere("reservation At", $end->toDateTimeString());
//            if($check2 === null ){
//                $res = new Reservation();
//                $res["reservation At"] = $end;
//                $res["user_id"] = 0;
//                $res["Reserved_by_Doctor"] = 1;
//                $res->save();
//            }
//        }
        $reservedobj = Reservation::whereBetween('reservation At',[$dateTimeFrom->toDateTime(),$dateTimeTo->toDateTime()])->get();

        $reserved = array();
        $isreserved = true;

        foreach ($reservedobj as $res){
            $first = Carbon::parse($res["reservation At"])->format('Hi');
            $first = (int)$first;
            array_push($reserved,$first);

            if($res["user_id"] === auth()->user()->id){
                $isreserved= false;
            }
        }

        array_push($reserved,$isreserved);
        echo json_encode($reserved);    // Echo Available Appointments Fro Day/Month
    }

    public function notification() {
//        echo count(Patientturn::all());
        $checkToday_patients = Reservation::whereBetween('reservation At',[Carbon::today()->toDateTime(),Carbon::today()->addHours(22)->toDateTime()])->where('Reserved_by_Doctor',0)->orderBy('reservation At','asc')->get();

        if (count(Patientturn::all()) == 0 && (count($checkToday_patients)!=0))
            echo json_encode(true);
        else
            echo json_encode(false);
    }





}

