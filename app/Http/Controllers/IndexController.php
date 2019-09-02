<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Topic;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id', 'Desc')->paginate(10);
        return view('index',compact('articles'));
    }
}