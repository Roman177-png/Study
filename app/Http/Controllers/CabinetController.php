<?php

namespace App\Http\Controllers;
use App\Models\Cabinet;

use App\Models\Article;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Topic;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CabinetController extends Controller
{

    public function cabinet()
    {
        $cabinets = Cabinet:: orderBy('id', 'Desc')->paginate(1);
        return view('own-cabinet.cabinet', compact('cabinets'));
    }

}