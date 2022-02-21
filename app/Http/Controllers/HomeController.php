<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //====================== Redirect For User & Admin
    public function redirect()
    {
        // Check if user Logined
        if (Auth::id()) {
            // Check if it's an Admin
            if (Auth::user()->role == 'admin') {
                return view('admin.home');
            }
            // Check if it's a Manager
            elseif (Auth::user()->role == 'manager') {
                return view('manager.home');
            }
            // Check if it's a Receptionist
            elseif (Auth::user()->role == 'receptionist') {
                return view('receptionist.home');
            }
            // Check if it's a Client
            else {
                return view('client.home');
            }
        } else {
            return redirect()->back();
        }
    }

    //=================== Open Index view if routing to root /
    public function index()
    {
        if (Auth::id()) {
            return redirect()->route('home');
        } else {
            return view('client.home');
        }
    }
}