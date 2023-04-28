<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // public function login()
    // {
    //     return view ('login&register');
    // }

    // public function registerUser(Request $REQUEST)
    // {
    
    //     $user = new User();
    //     $user->UserName=$REQUEST->name;
    //     $user->Email=$REQUEST->email;
    //     $user->Password=$REQUEST->password;
    //     $res = $user->save();
    //     if($res){
    //         return back()->with('success','You have registered successfully');
    //     }else{
    //         return back()->with('fail','Something wrong! check it again');
    //     }
    // }
}
