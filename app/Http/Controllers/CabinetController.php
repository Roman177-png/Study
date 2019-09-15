<?php

namespace App\Http\Controllers;
use App\Http\Requests\CabinetsFormValidation;
use App\Models\Cabinet;

use App\Models\Article;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Topic;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CabinetController extends Controller
{

    public function cabinet()
    {
        $cabinets = Cabinet::where('id', '>=', 13)->orderBy('id', 'Desc')->paginate(10);
        return view('own-cabinet.cabinet', compact('cabinets'));
    }

    public function addCabinet()
    {
        $users = User::get();
        return view('own-cabinet.add-cabinet', compact('users'));
    }

    public function submitCabinet(CabinetsFormValidation $request)
    {
        $cabinet = Cabinet::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'date_of_birth' => $request->input('date_of_birth'),
            'city_of_residence' => $request->input('city_of_residence'),
            'telegram' => $request->input('telegram'),
            'user_id' =>Auth::user()->id,
            'about_self' => $request->input('about_self'),


        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = "public/articles/{$cabinet->id}";
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
            if ($cabinet->images && is_file(storage_path("app/$path/$cabinet->images"))){
                unlink(storage_path("app/$path/$cabinet->images"));
            }
            $file->move(storage_path("app/$path"),$file->getClientOriginalName());
            $cabinet->images = $file->getClientOriginalName();
            $cabinet->save();
        };
        return redirect()->route('cabinet');
    }


    }
