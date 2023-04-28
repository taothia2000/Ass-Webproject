<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function login()
    {
        return view ('login&register');
    }

    public function registerUser(Request $REQUEST)
    {
    
    
        $users = new User();
        $users->userName=$REQUEST->name;
        $users->userEmail=$REQUEST->email;
        $users->userPassword=Hash::make($REQUEST->password);
        $res = $users->save();
        if($res){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something wrong! check it again');
        }
    }

    
    public function loginUser(Request $REQUEST)
    {
        $users = User::where('userEmail','=', $REQUEST->email)->first();
        if($users){
                if(Hash::check($REQUEST->password,$users->userPassword )){
                $REQUEST->session()->put('Email',$users->userEmail);
                return redirect('dashboard');
            }
            else{
                return  back()->with('fail','Incorrect password');
            }
        }
        else{
            return  back()->with('fail','This email is not registered.');
        }
    }
    
    
    public function dashboard() {
        return view('welcome');
    }
}
