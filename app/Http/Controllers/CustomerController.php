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
        return view ('admin/login&register');
    }

    // RegisterController
    public function registerUser(Request $REQUEST)
    {
    
        $role = $REQUEST->input('role');   
        $users = new User();
        $users->userName=$REQUEST->name;
        $users->userEmail=$REQUEST->email;
        $users->role=$role=1;
        $users->userPassword=Hash::make($REQUEST->password);
        $res = $users->save();
        if($res){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something wrong! check it again');
        }
    }

    // LoginController
    public function loginUser(Request $REQUEST)
    {
        $users = User::where('userEmail','=', $REQUEST->email)->first();
        if($users->role ==1){
                if(Hash::check($REQUEST->password,$users->userPassword )){
                $REQUEST->session()->put('Name',$users->userName);
                $REQUEST->session()->put('Email',$users->userEmail);
                return redirect('index');
                
            }
            else{
                return  back()->with('fail','Incorrect password');
            }
        }
        elseif($users->role ==2){
            $REQUEST->session()->put('Name',$users->userName);
            $REQUEST->session()->put('Email',$users->userEmail);
            return redirect('adminPage');
        }
        else{
            return  back()->with('fail','This email is not registered.');
        }
        
    }
    public function logOut(){
        if(Session::has('Email')){
            Session::pull('Email');
            return redirect('index');
        }
    }
    
}
