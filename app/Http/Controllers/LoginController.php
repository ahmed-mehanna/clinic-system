<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $phoneNumber = $request->input("phoneNumber");
        if (filter_var($phoneNumber, FILTER_VALIDATE_EMAIL)) {
            auth::attempt(['email' => $phoneNumber, "password" => $request->input("password")]);
        } else {
            auth::attempt(['phoneNumber' => $phoneNumber, "password" => $request->input("password")]);
        }
        if (auth::check()) {

            $user = User::find(auth()->user()->id);
            if ($user->Role == 1) {
                return redirect('/doctor');
            } elseif ($user->Role == 2) {
                return redirect('/nurse');
            } elseif ($user->Role == 3) {
                return redirect('/patient');
            }
        } else {
            return redirect()->back()->withErrors(['checkInvaliedLogin' => 'We couldnt verify your credentials']);
        }
    }
}
