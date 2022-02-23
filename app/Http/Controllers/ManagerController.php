<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
session_start();
class ManagerController extends Controller
{
    public function showResceptionists()
    {
        $receptionist = User::all()->where('role','=','receptionist');
        return view('manager.show_receptionists', ['receptionist' => $receptionist]);
    }
    public function deleteReceptionist($id){
        User::where('id', $id)->delete();
        return redirect()->route('show_receptionists');
    }
    public function updateReceptionist($id)
    {
        $_SESSION['id'] = $id;
        return view('manager.updateReceptionist');
    }
    public function updateReceptionistSave(Request $request)
    {
        $receptionist = User::find($_SESSION['id']);

       
        $validateForm=$request ->validate([
            'name' =>['required','min:3','max:10'],
            'password' =>[
            Password::min(8),
            Password::min(8)->letters(),
            Password::min(8)->mixedCase(),
            Password::min(8)->numbers(),
            Password::min(8)->symbols(),
            'confirmed'],
            'email' => 'email:rfc,dns',
            'national_id' => ['integer','size:14',
            'confirmPassword'=>'same:password'
            ]

        ]);
        $receptionist->name = $request->name;
        $receptionist->password = $request->password;
        $receptionist->email = $request->email;
        $receptionist->national_ID = $request->national_id;        
        $receptionist->save();
        return redirect()->route('show_receptionists');
    }
    public function ban($id){
        $receptionist = User::find($id);
        $receptionist->status = 'ban';
        $receptionist->save();
        return redirect()->route('show_receptionists');
    }
    public function unBan($id){
        $receptionist = User::find($id);
        $receptionist->status = 'unBan';
        $receptionist->save();
        return redirect()->route('show_receptionists');
    }
}
