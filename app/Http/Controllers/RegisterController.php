<?php

namespace App\Http\Controllers;

use App\Models\PatientHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneNumber' => ['required','unique:users,phoneNumber'],
            "password" => "required",
            "password_confirmation" => "required | same:password",
        ]);
        $user = User::firstWhere("email", $request->input("email"));
        if ($user === null) {
            $newUser = new User();
            $newUser["name"] = $request->input("name");
            $newUser["email"] = $request->input("email");
            $newUser["phoneNumber"] = $request->input("phoneNumber");
            $newUser["password"] = Hash::make($request->input("password"));
            $newUser->save();
//            $userhistory = new PatientHistory();
//            $userhistory['user_id'] = $user->id;
//            $userhistory->save();
            return redirect('/login');
        } else {
            $user1 = User::firstWhere("email", $request->input("email"));
            $user2 = User::firstWhere("phoneNumber", $request->input("phoneNumber"));
            if ($user1 === $user2) {
                return redirect()->back()->withErrors(['checkEmail' => 'This Account already exists ']);
            } elseif ($user2 === null && $user1) {
                return redirect()->back()->withErrors(['checkEmail' => 'This E-mail already exists ']);
            } elseif ($user1 === null && $user2) {
                return redirect()->back()->withErrors(['checkPhone' => 'This Phone Number  already exists ']);
            }

        }
    }
}
