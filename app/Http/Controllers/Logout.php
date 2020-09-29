<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
