<?php

namespace App\Http\Middleware;

use App\Models\Article;
use App\Models\Offer;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserArticle
{
    public function handle($request, Closure $next)
    {
        $idArticle=$request->route()->parameter('id_article');
       $article=Article::find($idArticle);
        if(Auth::user() && $article&& Auth::user()->id == $article->user_id){
            return $next($request);
        }
        return redirect()->route('index');
    }
}

