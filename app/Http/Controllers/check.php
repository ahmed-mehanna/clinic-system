<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class check extends Controller
{
    public function checkRole(){
        $user = User::find(auth()->user()->id);
        Auth::login($user);

        if($user->Role == 1){
           return redirect('/doctor');
        }elseif ($user->Role ==2){
            return redirect('/nurse');
        }elseif($user->Role ==3){
            return redirect('/patient');
        }
    }
}
