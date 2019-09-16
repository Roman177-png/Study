<?php

namespace App\Http\Middleware;

use App\Models\Cabinet;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserCabinet
{
    public function handle($request, Closure $next)
    {
        $idCabinet=$request->route()->parameter('id_cabinet');
       $cabinet=Cabinet::find($idCabinet);
        if(Auth::user() && $cabinet&& Auth::user()->id == $cabinet->user_id){
            return $next($request);
        }
        return redirect()->route('cabinet');
    }
}

