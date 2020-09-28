<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Exception_Days_Doctor;

class NurseController extends Controller
{

    public function index()
    {
        $reservation = Reservation::whereBetween('reservation At',[Carbon::today()->toDateTime(),Carbon::today()->addHours(16)->toDateTime()])->orderBy('reservation At','asc')->get();


        return view('pages.nurse-dashboard',["reservation" => $reservation,]);
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
            "email"=>"required",
            "password"=>"required",
            "phone-number"=>"required",

            "national-id"=>"required",
            "address"=>"required",
            "age"=>"required",
            "gender"=>"required",
        ]);
        $patient = new Patient();
        $patient2 = new Patient();
        $reserv = new Reservation();
        $user = new User();
        $patient2 = $patient::firstWhere("national-id", $request->input("national-id"));
        if($patient2 == null) {
            $user["name"] = $request["first-name"] . " " . $request["middle-name"] . " " . $request["last-name"];
            $user["email"] = $request["email"];
            $user["phoneNumber"] = $request["phone-number"];
            $user["password"] = $request["national-id"];

            $user->save();

            $patient["national-id"] = $request->input("national-id");
            $patient["address"] = $request->input("address");
            $patient["age"] = $request->input("age");

            $patient["gender"] = $request->input("gender");
            $patient["user_id"] = $user->id;

            $patient->save();

            $reserv["user_id"]= $user->id;
            $reserv["Reserved_by_Doctor"] = 0 ;
            $x = Reservation::whereBetween('reservation At',[Carbon::tomorrow()->toDateTime(),Carbon::tomorrow()->addHours(16)->toDateTime()])->orderBy('reservation At','asc')->get();
            $length = count($x);
            if(count($x)==0){
                $free = Carbon::tomorrow()->addHours(10);
                $reserv["reservation At"] = $free;
                $reserv->save();
            }else {
                foreach ($x as $key => $val) {
                    if (isset($x[$key+1])) {
                        $frist  = clone Carbon::parse($x[$key]["reservation At"]);
                        $second = clone Carbon::parse($x[$key+1]["reservation At"]);
                        if($second->diffInMinutes($frist)!="30"){
                            $frist->addMinutes(30);
                            $reserv["reservation At"] = $frist;
                            $reserv->save();
                            break;
                        }

                    } else {
                        $last = clone Carbon::parse($x[$key]["reservation At"]);
                        $last->addMinutes(30);
                        $from = Carbon::tomorrow()->addHours(10);
                        $to = Carbon::tomorrow()->addHours(16);
                        if ($last->betweenIncluded($from, $to)) {
                            $reserv["reservation At"] = $last;
                            $reserv->save();
                        }
                    }
                }
            }
        }
        else{
            $x = Reservation::whereBetween('reservation At',[Carbon::tomorrow()->toDateTime(),Carbon::tomorrow()->addHours(16)->toDateTime()])->orderBy('reservation At','asc')->get();
            $reserv["Reserved_by_Doctor"] = 1 ;
            if(count($x)==0){
                $free = Carbon::tomorrow()->addHours(10);
                $reserv["reservation At"] = $free;
                $reserv->save();
            }else {
                foreach ($x as $key => $val) {
                    if (isset($x[$key+1])) {
                        $frist  = clone Carbon::parse($x[$key]["reservation At"]);
                        $second = clone Carbon::parse($x[$key+1]["reservation At"]);
                        if($second->diffInMinutes($frist)!="30"){
                            $frist->addMinutes(30);
                            $reserv["reservation At"] = $frist;
                            $reserv->save();
                            break;
                        }

                    } else {
                        if (($x[$key]["Reserved_by_Doctor"] == 0) || ($x[$key]["Reserved_by_Doctor"] == 1 && $x[$key]["TO_Expection"] == 1)) {
                            $last = clone Carbon::parse($x[$key]["reservation At"]);
                            $last->addMinutes(30);
                            $from = Carbon::tomorrow()->addHours(10);
                            $to = Carbon::tomorrow()->addHours(16);
                            if ($last->betweenIncluded($from, $to)) {
                                $reserv["reservation At"] = $last;
                                $reserv->save();
                            }
                        }
                        else{
                            echo "tomorrow schedule is full" ;
                        }
                    }
                }
            }
            echo "he have account but we reserve" ;
        }
        return  redirect("/nurse");
    }

    public function update(Request $request)
    {
        $request->validate([
            "From_That_dayTime"=>"required",
            "To_that_Daytime"=>"required",
        ]);
        $reserv = new Reservation();
        $reserv2 = new Reservation();
        $from_That_dayTime = Carbon::parse($request->input("From_That_dayTime"));
        $to_That_dayTime = Carbon::parse($request->input("To_that_Daytime"));
        $reserv["reservation At"] = $from_That_dayTime ;
        $reserv["user_id"] = 0 ;
        $reserv["TO_Expection"] = 0 ;
        $reserv["Reserved_by_Doctor"] = 1 ;
        $reserv->save();

        $to_That_dayTime = Carbon::parse($request->input("To_that_Daytime"));
        $reserv2["reservation At"] = $to_That_dayTime ;
        $reserv2["user_id"] = 0 ;
        $reserv2["TO_Expection"] = 1 ;
        $reserv2["Reserved_by_Doctor"] = 1 ;
        $reserv2->save();

        return redirect('/nurse');

    }

    public function destroy($id)
    {
        //
    }
}
