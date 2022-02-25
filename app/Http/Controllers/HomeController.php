<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateManagerRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Reservation;
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
                $available_rooms = Room::all()->where('status', '=', 'Available');
                return view('admin.home', compact('managers', 'receps', 'floors', 'rooms', 'available_rooms'));
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
                $rooms = Room::all()->where('status', '=', 'Available');
                return view('client.home', compact('rooms'));
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
    //=========== make Reservations
    public function create_reservation(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:70',
            'accompany_number' => 'required|numeric|min:1|max:4',
            'room_number' => 'required|not_in:-1',
        ]);
        if ($validated) {
            $reservation = new Reservation;
            $reservation->client_name = $request->name;
            $reservation->client_id = Auth::user()->id;
            $reservation->room_number = $request->room_number;
            $reservation->status = 'In-Progress';
            $selected_room = Room::where('number', '=', $request->room_number)
                ->get()->first();

            $reservation->paid_price = $selected_room->price;

            if ($request->accompany_number <= $selected_room->capacity) {
                $reservation->accompany_number = $request->accompany_number;
            } else {
                return redirect()->back()
                    ->with('accompanyError', 'Accompany Number must be less than or equal to ' . $selected_room->capacity);
            }

            Room::where('number', $request->room_number)
                ->update([
                    'status' => 'Reserved'
                ]);

            $reservation->save();
            return redirect()->back()->with('message', 'Reservation is In-Progress');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
    //=========== get my Reservations
    public function my_reservations($id)
    {
        $reservations = Reservation::all()
            ->where('client_id', '=', $id);
        return view('client.my_reservations', compact('reservations'));
    }

    //=========== Cancel Reservations
    public function cancel_reservation($id)
    {
        $reservation = Reservation::find($id);

        Room::where('number', $reservation->room_number)
            ->update([
                'status' => 'Available'
            ]);

        $reservation->delete();

        return redirect()->back();
    }
}