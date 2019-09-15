<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffersFormValidation;
use App\Models\Article;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Topic;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function offers()
    {
        $offers = Offer:: where('id', '>=', 23)->orderBy('id', 'Desc')->paginate(10);
        return view('offers.offers', compact('offers'));
    }

    public function addOffer()
    {
        $users = User::get();
        $categories = Category::get();

        return view('offers.add-offer', compact('users', 'categories'));
    }

    public function submitAddOffer(OffersFormValidation $request)
    {
       $offer = Offer::create ([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('categories_id'),
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = "public/offers/{$offer->id}";
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
            $file->move(storage_path("app/$path"),$file->getClientOriginalName());
            $offer->images = $file->getClientOriginalName();
            $offer->save();
        };

        return redirect()->route('offers');
    }

    public function editOffer($offer_id)
    {
        $offer = Offer::find($offer_id);
        $users = User::get();
        $categories = Category::get();
        return view('offers.edit-offer', compact('offer','users','categories'));
    }
    public function submitEditOffer(OffersFormValidation $request, $offer_id)
    {
        $offer = Offer::find($offer_id);
        $offer->title = $request->input('title');
        $offer->price = $request->input('price');
        $offer->currency = $request->input('currency');
        $offer->description = $request->input('description');
        $offer->category_id = $request->input('categories_id');
        $offer->save();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = "public/offers/{$offer->id}";
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
            if ($offer->images && is_file(storage_path("app/$path/$offer->images"))){
                unlink(storage_path("app/$path/$offer->images"));
            }
            $file->move(storage_path("app/$path"), $file->getClientOriginalName());
            $offer->images= $file->getClientOriginalName();
            $offer->save();
        };


        return redirect()->route('offers');
    }
    public function deleteOffer($offer_id)
    {
        $offer=Offer::find($offer_id);
        $offer->delete();
        return redirect()->route('offers');

    }
    public function detailsOffer($offer_id)
    {
        $offer = Offer::find($offer_id);
        $user = User::find($offer->user_id);
        $category = Category::find($offer->category_id);
        return view('offers.details-offer', compact('offer','user','category'));
    }
    public function searchsOffer (Request $request )
    {
        $offers = Offer::where('title', 'like', '%' . $request->input('search') . '%')->orderBy('id','DESC')->paginate(10);
        return view('offers.offers', compact('offers'));

    }
}