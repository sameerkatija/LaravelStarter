<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewLogin(){
        return view('login' , ['title' => 'Login']);
    }
    public function loginUser()
    {
       request()->validate([
        'email' => 'required|max:255',
        'password' => 'required|max:255|min:8'
    ]);
    
    $user = User::where('email',request()->input('email'))->first();
    if($user){
        if(Hash::check(request()->input('password'), $user->password)){
            request()->Session()->put('Login_id', $user->id);
            return redirect('/campground')->with('status','Successfull Login');
        } else {
            return back()->with('error', 'Password Mismatch');
        }
    }
    return back()->with('error', 'User not found!');
    
    
    }
    public function viewRegister(){
        return view('register' , ['title' => 'Register']);
    }
    public function addUser()
    {
       request()->validate([
        'username' => 'required|max:255',
        'email' => 'required|max:255',
        'password' => 'required|max:255|min:8'
    ]);

    $user = new User([
        'username' => request()->input('username'),
        'email' => request()->input('email'),
        'password' => Hash::make(request()->input('password'))
    ]);
    $user->save();
    return redirect('/login')->with('status','Registration Successfull');
    }

    public function signout(){
        request()->session()->forget('Login_id');
        return redirect('/login');
    }
}
