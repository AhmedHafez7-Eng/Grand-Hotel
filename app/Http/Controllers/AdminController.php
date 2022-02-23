<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddManagerRequest;

use App\Http\Requests\UpdateManagerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BanNotification;
use App\Models\User;
use App\Models\Floor;
use App\Models\Room;

use Illuminate\Http\Request;

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

    //=========== Ban manager
    public function banned($id)
    {
        $manager = User::find($id);

        if ($manager->status == 'unBanned') {
            $manager->status = 'Banned';
            $details = [
                'greeting' => 'Hello Mr ' . $manager->name,
                'body' => "We'd like to inform you that you've been banned for 30 days by the Admin. You've to go to the company in the nearest time.",
                'actionText' => 'Here You can find your ban details',
                'actionURL' => 'https://ahmedhafezoffic.netlify.app/',
                'endPart' => 'Thank You.'
            ];

            Notification::send($manager, new BanNotification($details));

            $manager->save();
            return redirect()->back()->with('message', 'Manager has been Banned and Email Notification Sent Successfully');
        } else {
            $manager->status = 'unBanned';

            $details = [
                'greeting' => 'Hello Mr ' . $manager->name,
                'body' => "We'd like to inform you that your ban has been removed. You can now do your work Normally.",
                'actionText' => '',
                'actionURL' => '',
                'endPart' => 'Thank You.'
            ];

            Notification::send($manager, new BanNotification($details));

            $manager->save();
            return redirect()->back()->with('message', 'Manager has been UnBanned and Email Notification Sent Successfully');
        }
    }
}