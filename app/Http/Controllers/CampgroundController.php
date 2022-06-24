<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use App\Models\Campgrounds;
use App\Models\User;

class CampgroundController extends Controller
{
    public function viewCampground() {
    $camps = Campgrounds::all();
    return view('campground' , ['title' => 'Campgrounds', 'camps' => $camps]); 
    }
    public function newCampground() {
        if(request()->Session()->get('Login_id')){
            return view('newCampground' , ['title' => 'New Campground']);
        }
        return redirect('/login')->with('error', 'Signin to Continue');
    }
    public function AddCampground(){
    if(request()->Session()->get('Login_id')){
        request()->validate([
            'title' => 'required',
            'location' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $campground = new Campgrounds(['userid' => request()->Session()->get('Login_id'),
         'title' =>request()->input('title'),
         'location' =>request()->input('location'),
         'price' =>request()->input('price'),
         'description' =>request()->input('description'),
         'image' =>request()->input('image')]);            
         $campground->save();
        return redirect('/campground')->with('status','added');
        }
        return redirect('/login')->with('error', 'Signin to Continue');
    }

    public function CampgroundByID(){
        $camp = Campgrounds::where('id',request()->route('id'))->first();
        $username = User::where('id', $camp['userid'])->first();
        return view('showCampground')->with('camp',$camp)->with('title', $camp['title'])->with('username' , $username);
    }

    public function DeleteCamp(){
        $camp = Campgrounds::find(request()->route('id'));
        $camp->delete();
        return redirect('/campground')->with('status','added');
    }
    public function EditCampPage(){
        $camp = Campgrounds::find(request()->route('id'));
        return view('editCampground')->with('camp', $camp)->with('title', 'Edit Camp');
    }
    public function updateCampPage(){
        $camp = Campgrounds::find(request()->route('id'));
            request()->validate([
                'title' => 'required',
                'location' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required',
            ]);
         $camp->title = request()->input('title');
         $camp->location = request()->input('location');
         $camp->price = request()->input('price');
         $camp->description = request()->input('description');
         $camp->image = request()->input('image');  
         $camp->save();
         
         return redirect('/campground');
        }
}
