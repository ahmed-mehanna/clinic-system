<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Illness;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DoctorController extends Controller
{

    public function index()
    {
        $user = User::find(auth()->user()->id);

        return view('pages.doctor-dashboard',["user"=>$user]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        "illness-name"=>"required",
        "illness-diagnose"=>"required",
        "drugname"=>"required",
        "drugdescription"=>"required",

      ]);
      for ($i=0; $i < count($request['drugname']); ++$i){

       $illness = new Illness;
       $illness->illnessName = $request["illness-name"];
       $illness->illnessDiagnose = $request["illness-diagnose"];
       $illness->drugName = $request["drugname"][$i];
       $illness->drugDescription = $request["drugdescription"][$i];
       $illness->save();
     }
       return redirect('/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showPatient(){
      return view('doctor.findPatient');
    }
    public function findPatient(Request $request)
    {
        $request->validate([
          "Patient_Phone_Number"=>"required",
        ]);
        $user = User::firstWhere("phoneNumber",$request->input("Patient_Phone_Number"));
        return $user;
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
}
