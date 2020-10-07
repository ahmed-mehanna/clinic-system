<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PatientFourm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->PatientFourm()){
            return $next($request);
        }else{
            return redirect('/patient-fourm');
        }
    }
}
