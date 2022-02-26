<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddManagerRequest;
session_start();
class ManagerController extends Controller
{
    public function showResceptionists()
    {
        $receptionist = User::all()->where('role', '=', 'receptionist');
        return view('manager.show_receptionists', [
            'receptionist' => $receptionist,
        ]);
    }
    public function deleteReceptionist($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('show_receptionists');
    }
    public function updateReceptionist($id)
    {
        session()->put('id', $id);
        return view('manager.updateReceptionist');
    }
    public function updateReceptionistSave(Request $request)
    {
        $receptionist = User::find(session('id'));

        $validateForm = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'password' => [
                Password::min(8),
                Password::min(8)->letters(),
                Password::min(8)->mixedCase(),
                Password::min(8)->numbers(),
                Password::min(8)->symbols(),
                'confirmed',
            ],
            'email' => 'email:rfc,dns',
            'national_id' => ['digits:14'],
            'confirmPassword' => 'same:password',
        ]);
        $receptionist->name = $request->name;
        $receptionist->password = $request->password;
        $receptionist->email = $request->email;
        $receptionist->national_ID = $request->national_id;
        $receptionist->save();
        return redirect()->route('show_receptionists');
    }
    public function ban($id)
    {
        $receptionist = User::find($id);
        $receptionist->status = 'Banned';
        $receptionist->save();
        return redirect()->route('show_receptionists');
    }
    public function unBan($id)
    {
        $receptionist = User::find($id);
        $receptionist->status = 'unBanned';
        $receptionist->save();
        return redirect()->route('show_receptionists');
    }

    public function showRoom()
    {
        $rooms = Room::all();
        $rooms = Room::with('RelatedFloor')->get();
        return view('manager.show_rooms', [
            'rooms' => $rooms,
        ]);
    }
    public function deleteRoom($number)
    {
        $room = Room::find($number);
        if ($room->status == 'Available') {
            Room::where('number', $number)->delete();
        }
        return redirect()->route('show_rooms');
    }
    public function updateRoom($RoomId)
    {
        session()->put('RoomId', $RoomId);
        // $_SESSION['RoomId'] = $RoomId;
        return view('manager.updateRoom');
    }
    public function updateRoomSave(Request $request)
    {
        $room = Room::find(session('RoomId'));
        $validateForm = $request->validate([
            'id' => ['required'],
            'capacity' => ['required'],
            // 'price' => ['required'],
        ]);

        $room->id = $request->id;
        $room->capacity = $request->capacity;
        $room->price = number_format($request->price, 2);

        $room->save();
        return redirect()->route('show_rooms');
    }
    public function createRoom()
    {
        $room = Room::select('creator_id')
            ->groupBy('creator_id')
            ->get();
        $floors = Floor::all()->where('creator_id', '=', Auth::user()->id);
        return view('manager.createRoom', ['room' => $room, 'floors' => $floors]);
    }
    public function createRoomSave(Request $request)
    {
        $room = new Room();
        $floor = new Floor();
        $validateForm = $request->validate([
            'capacity' => ['required'],
            'price' => ['required'],
            'floor_number' => 'required|not-in:-1',
        ]);
        $room['capacity'] = $request->capacity;
        $room['price'] = $request->price * 100;
        $room['creator_id'] = Auth::user()->id;
        $room['floor_number'] = $request->floor_number;
        $room['status']='Available';
        $room->save();
        return redirect()->route('show_rooms');
    }

    public function showFloors()
    {
        $floors = Floor::all();
        return view('manager.show_floors', ['floors' => $floors]);
    }
    public function deleteFloor($number)
    {
        Floor::where('number', $number)->delete();
        return redirect()->route('show_floors');
    }

    public function updateFloor($idf)
    {
        session()->put('idf', $idf);
        return view('manager.update_floor');
    }
    public function updateFloorSave(Request $request)
    {
        $floor = Floor::find(session('idf'));

        $validateForm = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'number' => ['required', 'digits : 4'],
        ]);

        $floor->name = $request->name;

        $floor->save();
        return redirect()->route('show_floors');
    }
    public function createFloor()
    {
        return view('manager.createFloor');
    }
    public function createFloorSave(Request $request)
    {
        $validateForm = $request->validate([
            'name' => ['required', 'size:3']
        ]);
        $floor = new Floor();
        $floor->name = $request->name;
        $floor->creator_id = Auth::user()->id;
        $floor->save();
        return redirect()->route('show_floors');
    }
    public function showapproved()
    {
        $approved = DB::table('reservations')
            ->where('status', 'approve')
            ->get();
        $inprogress = DB::table('reservations')
            ->where('status', 'In-Progress')
            ->get();
        $nonapproved = DB::table('reservations')
            ->where('status', 'nonapproved')
            ->get();
        return view('manager.receptionist', compact('approved', 'nonapproved', 'inprogress'));
    }
    public function change($id)
    {
         $reservation=Reservation::find($id);
            

        if ($reservation->status == 'Approved'){
            $reservation->status = 'nonapproved';
        }
            

        else if ($reservation->status == 'In-Progress' && isset($_GET['non']))
        {
            $reservation->status = 'nonapproved';
        }

        else if ($reservation->status == 'In-Progress' && isset($_GET['app']))
        {
            $reservation->status = 'Approved';
        }

        $reservation->save();

        $approved = DB::table('reservations')
            ->where('status', 'Approved')
            ->get();
        $inprogress = DB::table('reservations')
            ->where('status', 'In-Progress')
            ->get();
        $nonapproved = DB::table('reservations')
            ->where('status', 'nonapproved')
            ->get();
       
        return view('manager.receptionist', compact('approved', 'nonapproved', 'inprogress'));
    }
    public function add_receptionist()
    {
        return view('manager.add_receptionist');
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
}
