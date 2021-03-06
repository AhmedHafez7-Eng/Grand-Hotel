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
        $inprogress= DB::table('reservations')
        ->where('status', 'In-Progress')
        ->get();
        $nonapproved= DB::table('reservations')
        ->where('status', 'nonapproved')
        ->get();
        return view('receptionist.receptionist',compact('approved','nonapproved','inprogress'));
        
    }
    public function change($id){
        $reservation=Reservation::find($id);
        if($reservation->status=='approve')
        $reservation->status='nonapproved';
        
        else if($reservation->status=='In-Progress' && isset($_GET['non']))
        $reservation->status='nonapproved';
        else if($reservation->status=='In-Progress' && isset($_GET['app']))
        $reservation->status='approve';
        $reservation->save();
        return redirect()->route('receptionist');
    }
}
