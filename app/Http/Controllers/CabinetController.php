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
        $cabinet = Cabinet::where('user_id', Auth::user()->id)->first();
        return view('own-cabinet.cabinet', compact('cabinet'));
    }

    public function editCabinet($cabinet_id)
    {
        $cabinet = Cabinet::find($cabinet_id);
        $users = User::get();
        return view('own-cabinet.edit-cabinet', compact('cabinet', 'users'));
    }

    public function submitEditCabinet(CabinetsFormValidation $request, $cabinet_id)
    {
        $cabinet = Cabinet::find($cabinet_id);
        $cabinet->first_name = $request->input('first_name');
        $cabinet->last_name = $request->input('last_name');
        $cabinet->email = $request->input('email');
        $cabinet->phone = $request->input('phone');
        $cabinet->date_of_birth = $request->input('date_of_birth');
        $cabinet->city_of_residence = $request->input('city_of_residence');
        $cabinet->telegram = $request->input('telegram');
        $cabinet->about_self = $request->input('about_self');
        $cabinet->save();
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $path = "public/cabinets/{$cabinet->id}";
            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }
            if ($cabinet->images && is_file(storage_path("app/$path/$cabinet->images"))) {
                unlink(storage_path("app/$path/$cabinet->images"));
            }
            $file->move(storage_path("app/$path"), $file->getClientOriginalName());
            $cabinet->images = $file->getClientOriginalName();
            $cabinet->save();
        };


        return redirect()->route('cabinet');


    }
}
