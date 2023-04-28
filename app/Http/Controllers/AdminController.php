<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view ('admin/index');
    }

    public function login()
    {
        return view ('admin/login&register');
    }

   
}
