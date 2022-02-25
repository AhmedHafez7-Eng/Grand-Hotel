<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BanNotification;
use App\Models\User;
use App\Models\Floor;
use App\Models\Room;

class AdminController extends Controller
{
    // ========================================== Managers
    //=========== Get All Managers
    public function show_managers()
    {
        $managers = User::all()->where('role', '=', 'manager');
        // For API
        // return response()->json($managers);
        return view('admin.show_managers', compact('managers'));
    }
    //=========== Redirect to Add manager
    public function addManager()
    {
        return view('admin.add_manager');
    }
    //=========== Create Manager
    public function createManager(AddManagerRequest $request)
    {
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'email', 'password', 'national_id', 'country', 'gender', 'usrImg']);
        if ($validated) {
            $manager = new User;

            $image = $request->usrImg;
            $imageName = time() . '.' . $image->getClientoriginalExtension();
            $request->usrImg->move('usersImages', $imageName);

            $manager->avatar_Img = $imageName;
            $manager->name = $request->name;
            $manager->email = $request->email;
            $manager->password = Hash::make($request->password);
            $manager->national_ID = $request->national_id;
            $manager->country = $request->country;
            $manager->gender = $request->gender;

            $manager->role = 'manager';
            $manager->creator_id = Auth::user()->id;


            $manager->save();
            return redirect()->back()->with('message', 'Manager Added Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
    //=========== Delete manager
    public function deleteManager($id)
    {
        $manager = User::find($id);
        $manager->delete();

        return redirect()->back();
    }

    //=========== Redirect to Update manager page
    public function updateManager($id)
    {
        $manager = User::find($id);
        return view('admin.updateManager', compact('manager'));
    }
    //=========== Update manager
    public function edit_manager(UpdateManagerRequest $request, $id)
    {
        $manager = User::find($id);
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'email', 'password', 'national_id', 'country', 'gender', 'usrImg']);
        if ($validated) {

            $image = $request->usrImg;
            if ($image) {
                $imageName = time() . '.' . $image->getClientoriginalExtension();
                $request->usrImg->move('usersImages', $imageName);
                $manager->avatar_Img = $imageName;
            }
            if ($request->name) {
                $manager->name = $request->name;
            }
            if ($request->email) {
                $manager->email = $request->email;
            }
            if ($request->password) {
                $manager->password = Hash::make($request->password);
            }
            if ($request->national_id) {
                $manager->national_ID = $request->national_id;
            }
            if ($request->country) {
                $manager->country = $request->country;
            }
            if ($request->gender) {
                $manager->gender = $request->gender;
            }

            $manager->save();
            return redirect('show_managers')->with('message', 'Manager Updated Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }

    // ========================================== Receptionists
    //=========== Get All Receptionists
    public function show_receptionists()
    {
        $receps = User::all()->where('role', '=', 'receptionist');
        // For API
        // return response()->json($managers);
        return view('admin.show_receptionists', compact('receps'));
    }
    //=========== Redirect to Add Receptionist
    public function add_receptionist()
    {
        return view('admin.add_receptionist');
    }
    //=========== Create Receptionist
    public function create_receptionist(AddManagerRequest $request)
    {
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'email', 'password', 'national_id', 'country', 'gender', 'usrImg']);
        if ($validated) {
            $recep = new User;

            $image = $request->usrImg;
            $imageName = time() . '.' . $image->getClientoriginalExtension();
            $request->usrImg->move('usersImages', $imageName);

            $recep->avatar_Img = $imageName;
            $recep->name = $request->name;
            $recep->email = $request->email;
            $recep->password = Hash::make($request->password);
            $recep->national_ID = $request->national_id;
            $recep->country = $request->country;
            $recep->gender = $request->gender;

            $recep->role = 'receptionist';
            $recep->creator_id = Auth::user()->id;


            $recep->save();
            return redirect()->back()->with('message', 'Receptionist Added Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
    //=========== Delete Receptionist
    public function delete_receptionist($id)
    {
        $recep = User::find($id);
        $recep->delete();

        return redirect()->back();
    }

    //=========== Redirect to Update Receptionist page
    public function update_receptionist($id)
    {
        $recep = User::find($id);
        return view('admin.update_receptionist', compact('recep'));
    }
    //=========== Update Receptionist
    public function edit_receptionist(UpdateManagerRequest $request, $id)
    {
        $recep = User::find($id);
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'email', 'password', 'national_id', 'country', 'gender', 'usrImg']);
        if ($validated) {

            $image = $request->usrImg;
            if ($image) {
                $imageName = time() . '.' . $image->getClientoriginalExtension();
                $request->usrImg->move('usersImages', $imageName);
                $recep->avatar_Img = $imageName;
            }
            if ($request->name) {
                $recep->name = $request->name;
            }
            if ($request->email) {
                $recep->email = $request->email;
            }
            if ($request->password) {
                $recep->password = Hash::make($request->password);
            }
            if ($request->national_id) {
                $recep->national_ID = $request->national_id;
            }
            if ($request->country) {
                $recep->country = $request->country;
            }
            if ($request->gender) {
                $recep->gender = $request->gender;
            }

            $recep->save();
            return redirect('show_receptionists')->with('message', 'Receptionist Updated Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }

    //=========== Ban User
    public function banned($id)
    {
        $user = User::find($id);

        if ($user->status == 'unBanned') {
            $user->status = 'Banned';
            $details = [
                'greeting' => 'Hello Mr ' . $user->name,
                'body' => "We'd like to inform you that you've been banned for 30 days by the Admin. You've to go to the company in the nearest time.",
                'actionText' => 'Here You can find your ban details',
                'actionURL' => 'https://ahmedhafezoffic.netlify.app/',
                'endPart' => 'Thank You.'
            ];

            Notification::send($user, new BanNotification($details));

            $user->save();
            return redirect()->back()->with('message', 'User has been Banned and Email Notification Sent Successfully');
        } else {
            $user->status = 'unBanned';

            $details = [
                'greeting' => 'Hello Mr ' . $user->name,
                'body' => "We'd like to inform you that your ban has been removed. You can now do your work Normally.",
                'actionText' => '',
                'actionURL' => '',
                'endPart' => 'Thank You.'
            ];

            Notification::send($user, new BanNotification($details));

            $user->save();
            return redirect()->back()->with('message', 'User has been UnBanned and Email Notification Sent Successfully');
        }
    }


    // ========================================== Floors

    //=========== Get All Floors
    public function show_floors()
    {
        $floors = Floor::all();
        return view('admin.show_floors', compact('floors'));
    }
    //=========== Create Floor
    public function create_floor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|size:3',
        ]);
        if ($validated) {
            $floor = new Floor;
            $floor->name = $request->name;
            $floor->creator_id = Auth::user()->id;
            $floor->save();
            return redirect()->back()->with('message', 'Floor Added Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
    //=========== Delete Floor
    public function delete_floor($number)
    {
        Floor::where('number', $number)->delete();

        return redirect()->back();
    }

    //=========== Redirect to Update Floor page
    public function update_floor($number)
    {
        $floor = Floor::where('number', $number)->get()->first();
        return view('admin.update_floor', compact('floor'));
    }
    //=========== Update Floor
    public function edit_floor(Request $request, $number)
    {
        $validated = $request->validate([
            'name' => 'size:3',
        ]);
        if ($validated) {
            if ($request->name) {
                Floor::where('number', $number)
                    ->update([
                        'name' => $request->name
                    ]);
            }
            return redirect('show_floors')->with('message', 'Floor Updated Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }

    // ========================================== Rooms

    //=========== Get All Rooms
    public function show_rooms()
    {
        $rooms = Room::all();
        $floors = Floor::all()->where('creator_id', '=', Auth::user()->id);
        return view('admin.show_rooms', compact('rooms', 'floors'));
    }
    //=========== Create Room
    public function create_room(Request $request)
    {
        $validated = $request->validate([
            'capacity' => 'required|numeric|min:1|max:4',
            'price' => 'required|numeric',
            'floor_num' => 'required|digits:3|not_in:-1',
        ]);
        if ($validated) {
            $room = new Room;
            $room->capacity = $request->capacity;
            $room->price = $request->price;
            $room->floor_number = $request->floor_num;
            $room->status = 'available';
            $room->creator_id = Auth::user()->id;
            $room->save();
            return redirect()->back()->with('message', 'Room Added Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
    //=========== Delete Room
    public function delete_room($number)
    {
        Room::where('number', $number)->delete();

        return redirect()->back();
    }

    //=========== Redirect to Update Room page
    public function update_room($number)
    {
        $room = Room::where('number', $number)->get()->first();
        return view('admin.update_room', compact('room'));
    }
    //=========== Update Room
    public function edit_room(Request $request, $number)
    {
        $validated = $request->validate([
            'capacity' => 'numeric|min:1|max:4',
            'price' => 'numeric',
        ]);
        if ($validated) {
            if ($request->capacity) {
                Room::where('number', $number)
                    ->update([
                        'capacity' => $request->capacity
                    ]);
            }
            if ($request->price) {
                Room::where('number', $number)
                    ->update([
                        'price' => $request->price
                    ]);
            }
            return redirect('show_rooms')->with('message', 'Room Updated Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
}