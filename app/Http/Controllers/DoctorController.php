<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Illness;
use App\Models\Drug;
use App\Models\PatientHistory;
use App\Models\Rumour;
use App\Models\analysis;
use App\Models\Patientturn;
use App\Models\Rumour_Medical_History;
use App\Models\Analysis_Medical_History;
use App\Models\Drug_Medical_History;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Result;

class DoctorController extends Controller
{

    public static function index()
    {
        $userTurn = Patientturn::all();
        $userTurn = $userTurn->first();
        if ($userTurn === null) {
            return redirect()->back()->with('messageError', 'There are no recently patient has been arrived');

        } else {

            return view('pages.doctor-dashboard', ["userTurn" => $userTurn]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            "illness-name" => "required",
//            "illness-diagnose" => "required",
//            "select_type.*" => "required",
//            "name.*" => "required",
//            "description.*" => "required",
//            "user_id" => "required",
////********************************************************************//
//        "Summary"=> "required",
//        "select-type.*" => "required",
//        "medicalData_Title.*"=> "required",
//        "medicalData_Result.*"=> "required",
//
//        ]);
        $illness = new Illness;
        $illness->illnessName = $request["illness-name"];
        $illness->illnessDiagnose = $request["illness-diagnose"];
        $illness->user_id = $request["user_id"];
        $illness->save();


        if ($request['select-type-no-data'] != 'true') {
            for ($i = 0; $i < count($request['select_type']); ++$i) {
                if ($request["select_type"][$i] == "Drugs") {
                    $drug = new Drug();
                    $drug->drugName = $request["name"][$i];
                    $drug->drugDescription = $request["description"][$i];
                    $drug->illness_id = $illness->id;
                    $drug->save();
                } elseif ($request["select_type"][$i] == "Analysis") {
                    $analyses = new analysis();
                    $analyses->title = $request["name"][$i];
                    $analyses->result = $request["description"][$i];
                    $analyses->illness_id = $illness->id;
                    $analyses->save();

                } elseif ($request["select_type"][$i] == "Rumours") {
                    $rumour = new Rumour();
                    $rumour->title = $request["name"][$i];
                    $rumour->result = $request["description"][$i];
                    $rumour->illness_id = $illness->id;
                    $rumour->save();
                }
            }
        }

        //if not have summary and analses and rumors
//      $patient_history = new PatientHistory();
//      $patient_history["Summary"] = $request["summary"];
//      $patient_history["user_id"] = $request["user_id"];
        $user_update_summary = PatientHistory::firstWhere("user_id",$request->input("user_id"));

        $user_update_summary->update(['Summary'=>$request->input("Summary")]);
//

        if ($request['select-type2-no-data'] != 'true') {
            for ($i = 0; $i < count($request['select-type2']); ++$i) {
                if ($request["select-type2"][$i] == "Drugs") {
                    $medicalDrug = new Drug_Medical_History();
                    $medicalDrug->drugName = $request["medicalData_Title"][$i];
                    $medicalDrug->drugDescription = $request["medicalData_Result"][$i];
                    $medicalDrug->user_id = $request["user_id"];;
                    $medicalDrug->save();
                } elseif ($request["select-type2"][$i] == "Analysis") {
                    $medicalAnalyses = new Analysis_Medical_History();
                    $medicalAnalyses->title = $request["medicalData_Title"][$i];
                    $medicalAnalyses->result = $request["medicalData_Result"][$i];
                    $medicalAnalyses->user_id = $request["user_id"];
                    $medicalAnalyses->save();

                } elseif ($request["select-type2"][$i] == "Rumours") {
                    $medicalRumour = new Rumour_Medical_History();
                    $medicalRumour->title = $request["medicalData_Title"][$i];
                    $medicalRumour->result = $request["medicalData_Result"][$i];
                    $medicalRumour->user_id = $request["user_id"];;
                    $medicalRumour->save();
                }
            }
        }

//        $userSkipturn = User::find($request->input("user_id"));
//        $userSkipturn->patientTurn->delete();

        if ($request['no-patients'] == 'true')
            return redirect('/');
        else
            return redirect('/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    public function findPatient(Request $request)
    {
        $data = $request->input("data");
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            $user = User::firstWhere("email", $request->input("data"));
            if ($user === null || ($user->id === \auth()->user()->id) || $user->Role == 2 ||$user->patient === null) {
                return redirect('/')->with('searchError', 'We couldn\'t find your patient');
            } else {
                return view('pages.doctor-find-patient', ["user" => $user]);
            }
        } else {
            $user1 = User::firstWhere("id", $request->input("data"));
            $user2 = User::firstWhere("phoneNumber", $request->input("data"));

            if ($user1 && $user2 === null) {
                if ($user1->id === \auth()->user()->id || $user1->Role == 2||$user1->patient === null) {
                    return redirect('/')->with('searchError', 'We couldn\'t find your patient');
                } else {

                    return view('pages.doctor-find-patient', ["user" => $user1]);
                }
            } elseif ($user2 && $user1 === null) {
                $doctor = User::find(auth()->user()->id);
                if ($doctor->phoneNumber === $user2->phoneNumber || $user2->Role == 2 ||$user2->patient === null) {
                    return redirect('/')->with('searchError', 'We couldn\'t find your patient');
                } else {
                    return view('pages.doctor-find-patient', ["user" => $user2]);
                }
            } else {
                return redirect('/')->with('searchError', 'We couldn\'t find your patient');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function nextPatient($emptyTable) {
        $checkToday_patients = Reservation::whereBetween('reservation At',[Carbon::today()->toDateTime(),Carbon::today()->addHours(22)->toDateTime()])->where('Reserved_by_Doctor',0)->orderBy('reservation At','asc')->get();
        if ($emptyTable == 'false')
            Patientturn::truncate();
        if ($emptyTable == 'false' && count($checkToday_patients) == 0)
            echo json_encode('no-patients');
        else if (count(Patientturn::all()) == 0)
            echo json_encode(false);
        else
            echo json_encode(true);
    }

    public function manageAppointments() {
        return view('pages.doctor-show-appointments');
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

        if(count($res_check2_for_duplicate)!=0) {
            $start = clone Carbon::parse($res_check2_for_duplicate[0]["reservation At"]);
            if($start->isPast()) {
                for ($date = clone $start; $date->diffInMinutes($datenow) >= "30"; $date->addMinutes(30)) {
                    $date->addMinutes(30);
                    $res = new Reservation();
                    $res["reservation At"] = $date;
                    $res["user_id"] = 0;
                    $res["Reserved_by_Doctor"] = 1;
                    $res->save();
                }
            }
        }elseif(count($res_check2_for_duplicate)==0){
            $start = clone Carbon::today();
            $start->addHours(8);
            if($start->isPast()) {
                for ($date = clone $start; $date->diffInMinutes($datenow) > "30"; $date->addMinutes(30)) {
                    $res = new Reservation();
                    $res["reservation At"] = $date;
                    $res["user_id"] = 0;
                    $res["Reserved_by_Doctor"] = 1;
                    $res->save();
                }
            }
        }
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

}
