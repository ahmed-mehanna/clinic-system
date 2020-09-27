<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt([
            "phoneNumber" => $request->input("phoneNumber"),
            "password" => $request->input("password")
        ])) {
            $user = User::firstWhere("phoneNumber", $request->input("phoneNumber"));

            if($user->Role == 1){
              return redirect('/doctor');
            }elseif ($user->Role ==2){
                return redirect('/nurse');
            }elseif($user->Role ==3){
                return redirect('/patient');
            }else{
                return  redirect()->back();
            }
        }
    }
}
