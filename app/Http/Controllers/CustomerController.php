<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function login()
    {
        return view ('login&register');
    }

    public function registerUser(Request $REQUEST)
    {
    
    
        $users = new User();
        $users->UserName=$REQUEST->name;
        $users->Email=$REQUEST->email;
        $users->Password=Hash::make($REQUEST->password);
        $res = $users->save();
        if($res){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something wrong! check it again');
        }
    }
    public function loginUser(Request $REQUEST)
    {
       
        // $users = User::where('Email','=', $REQUEST->email)->first();
        $users = User::find($REQUEST->email);
        if($users){
            if(Hash::check($users->Password,$REQUEST->password)){
                $REQUEST->session()->put('Email',$users->email);
                $REQUEST->session()->put('Password',$users->password);
                return redirect('dashboard');
            }else{
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
