<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateManagerRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Models\Floor;
use App\Models\Room;

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
                $managers = User::all()->where('role', '=', 'manager');
                $receps = User::all()->where('role', '=', 'receptionist');
                $floors = Floor::all();
                $rooms = Room::all();
                return view('admin.home', compact('managers', 'receps', 'floors', 'rooms'));
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
       
            return view('client.home');
        
    }

    //=========== Redirect to profile page
    public function updateProfile($id)
    {
        $user = User::find($id);
        return view('updateProfile', compact('user'));
    }
    //=========== Update manager
    public function edit_profile(UpdateManagerRequest $request, $id)
    {
        $user = User::find($id);
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'email', 'password', 'national_id', 'country', 'gender', 'usrImg']);
        if ($validated) {

            $image = $request->usrImg;
            if ($image) {
                $imageName = time() . '.' . $image->getClientoriginalExtension();
                $request->usrImg->move('usersImages', $imageName);
                $user->avatar_Img = $imageName;
            }
            if ($request->name) {
                $user->name = $request->name;
            }
            if ($request->email) {
                $user->email = $request->email;
            }
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            if ($request->national_id) {
                $user->national_ID = $request->national_id;
            }
            if ($request->country) {
                $user->country = $request->country;
            }
            if ($request->gender) {
                $user->gender = $request->gender;
            }

            $user->save();
            return redirect('home')->with('message', 'Your Profile has been Updated Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
}