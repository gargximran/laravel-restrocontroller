<?php

namespace App\Http\Controllers;

use App\Models\RestroOwner;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(){
        $users = RestroOwner::orderBy('id', 'desc')->get();
        return view('pages.home', compact('users'));
    }


    public function add(){
        return view('pages.add_user');
    }


    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "address" => "required",
            "phone" => "required",
            "password" => 'required'
        ]);

        $restroOwner = new RestroOwner();
        $restroOwner->name = $request->name;
        $restroOwner->email = $request->email;
        $restroOwner->phone = $request->phone;
        $restroOwner->address = $request->address;
        $restroOwner->user_id = time();
        $restroOwner->password = Hash::make($request->password);
        $restroOwner->save();
        return redirect()->route('home');
    }

    public function single_owner(RestroOwner $restroOwner){
        $owner = $restroOwner;
        return view('pages.single_owner', compact('owner'));
    }

    public function subscription(RestroOwner $restroOwner, Request $request){
        
        $request->validate([
            'tk' => 'required|numeric',
            'day' => 'required|numeric'
        ]);

        $subscription = new Subscription();
        $subscription->payment = $request->tk;
        $subscription->day = $request->day;
        $subscription->owner()->associate($restroOwner);
        if($subscription->save()){
            if($request->new){
                $restroOwner->end = Carbon::now()->addDays($subscription->day);
                if($restroOwner->save()){
                    return back();
                }

            }else{
                
                $subscription->created_at = Carbon::parse($restroOwner->end);
                $subscription->updated_at = Carbon::parse($restroOwner->end);
                $subscription->save();
                $restroOwner->end = Carbon::parse($restroOwner->end)->addDays($subscription->day);
                if($restroOwner->save()){
                    return back();
                }
            }

            return back();
        }
        return back();
    }



    public function logout(){
       Auth::logout();

       return redirect()->route('login');

      
    }


    public function login(){
        return view('pages.login');
      
    }

    public function loginAttempt(Request $request){

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }
        return back();
    }
}
