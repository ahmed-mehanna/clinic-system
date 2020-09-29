<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RestPasswordController extends Controller
{
    public function update(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required",
            "password_confirmation"=>"required | same:password",
        ]);
        $user = User::firstWhere("email",$request->input("email"));
        $user->update(["password"=>Hash::make($request->input("password"))]);
        //dd("password has been changed successfully");
        return redirect('/');
    }
}
