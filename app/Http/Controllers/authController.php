<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{

    public function dashboard(){
        if(Auth::user()->role == 'Admin'){
            $blogArr = Blog::all();
        }else{
            $blogArr = Blog::where('user_id',Auth::user()->id)->get();
        }
        return view('admin')->with(compact('blogArr'));
    }

    public function loginIndex(){
       return view('login');
    }
    public function logoutUser(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function loginForm(Request $request){
      $validator =   $request->validate(['email'=>'required','password'=>'required']);
        if($validator){
            if(Auth::attempt($validator)){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('login')->with(['error' => 'login details are not valid']);
            }
        }
        return view('login');
    }

     public function registerIndex()
    {
       return view('register');
    }
    
    public function registerForm(Request $request){
    
        $validator = $request->validate([
        'first_name' =>'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'password'=>'required',
        'dob'=>'required|date',
        'image' => 'required|mimes:jpeg,png,jpg|max:2048'
    ]);
    if ($validator) {
        $validator['password'] = Hash::make($validator['password']);
        $newProfileName = time().".".$request->image->extension();
        $request->image->move(public_path('profile_images'), $newProfileName);
        $validator['image'] = $newProfileName;
        User::create($validator);
        return view('login')->with(['success'=>'You have successfully created account']);
    }
    return view('register');
}
    
}
