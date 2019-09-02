<?php

namespace App\Http\Middleware;

use App\Models\Offer;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    public function handle($request, Closure $next)
    {
        $idOffer=$request->route()->parameter('id_offer');
       $offer=Offer::find($idOffer);
        if(Auth::user() && $offer&& Auth::user()->id == $offer->user_id){
            return $next($request);
        }
        return redirect()->route('index');
    }
}

