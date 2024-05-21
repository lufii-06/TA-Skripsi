<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SenseiController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('sensei.sensei-index',compact('user'));
    }
}
