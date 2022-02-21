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
        return view('admin.manageReservation',compact('approved'));
        
    }
    public function shownonapproved(){
        $nonapproved= DB::table('reservations')
        ->where('status', 'nonapproved')
        ->get();
        return view('admin.manageReservation',compact('nonapprovedk'));
        
    }
    public function change($id){
        $reservation=Reservation::find($id);
        if($reservation->status=='approved')
        $reservation->status='nonapproved';
        else 
        $reservation->status='approved';
        return(view('admin.manageReservation',[$mess=>'change saved']));
    }
}
