<?php

namespace App\Http\Controllers;

use App\Models\Patient;
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

    public function index()
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
        $request->validate([
            "illness-name" => "required",
            "illness-diagnose" => "required",
            "select_type.*" => "required",
            "name.*" => "required",
            "description.*" => "required",
            "user_id" => "required",
//********************************************************************//
        "Summary"=> "required",
        "select-type.*" => "required",
        "medicalData_Title.*"=> "required",
        "medicalData_Result.*"=> "required",

        ]);
        $illness = new Illness;
        $illness->illnessName = $request["illness-name"];
        $illness->illnessDiagnose = $request["illness-diagnose"];
        $illness->user_id = $request["user_id"];
        $illness->save();


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

        //if not have summary and analses and rumors
//      $patient_history = new PatientHistory();
//      $patient_history["Summary"] = $request["summary"];
//      $patient_history["user_id"] = $request["user_id"];
        $user_update_summary = PatientHistory::firstWhere("user_id",$request->input("user_id"));

        $user_update_summary->update(['Summary'=>$request->input("Summary")]);
//

        for ($i = 0; $i < count($request['select-type']); ++$i) {
            if ($request["select-type"][$i] == "Drugs") {
                $medicalDrug = new Drug_Medical_History();
                $medicalDrug->drugName = $request["medicalData_Title"][$i];
                $medicalDrug->drugDescription = $request["medicalData_Result"][$i];
                $medicalDrug->user_id = $request["user_id"];;
                $medicalDrug->save();
            } elseif ($request["select-type"][$i] == "Analysis") {
                $medicalAnalyses = new Analysis_Medical_History();
                $medicalAnalyses->title = $request["medicalData_Title"][$i];
                $medicalAnalyses->result = $request["medicalData_Result"][$i];
                $medicalAnalyses->user_id = $request["user_id"];
                $medicalAnalyses->save();

            } elseif ($request["select-type"][$i] == "Rumours") {
                $medicalRumour = new Rumour_Medical_History();
                $medicalRumour->title = $request["medicalData_Title"][$i];
                $medicalRumour->result = $request["medicalData_Result"][$i];
                $medicalRumour->user_id = $request["user_id"];;
                $medicalRumour->save();
            }
        }

//        $userSkipturn = User::find($request->input("user_id"));
//        $userSkipturn->patientTurn->delete();

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
        if ($emptyTable == 'false')
                Patientturn::truncate();
        if (count(Patientturn::all()) == 0)
            echo json_encode(false);
        else
            echo json_encode(true);
    }

}
