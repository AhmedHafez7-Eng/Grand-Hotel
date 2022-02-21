<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Reservation;
class reciptionController extends Controller
{
    //
    public function showapproved(){
        $approved= DB::table('reservations')
        ->where('status', 'approve')
        ->get();
        $nonapproved= DB::table('reservations')
        ->where('status', 'nonapproved')
        ->get();
        return view('admin.receptionist',compact('approved','nonapproved'));
        
    }
    public function change($id){
        $mess='change saved';
        $reservation=Reservation::find($id);
        if($reservation->status=='approve')
        $reservation->status='nonapproved';
        else 
        $reservation->status='approve';
        $reservation->save();
        return redirect()->route('receptionist');
    }
}
