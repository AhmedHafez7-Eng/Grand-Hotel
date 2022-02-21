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
        ->where('status', 'approved')
        ->get();
        return view('admin.manageReservation',compact('approved'));
        
    }
    public function showinprogress(){
        $inprogress= DB::table('reservations')
        ->where('status', 'In-Progress')
        ->get();
    
        return view('admin.manageReservation',['inprogress'=>$inprogress]);
        
    }
    public function shownonapproved(){
        $nonapproved= DB::table('reservations')
        ->where('status', 'nonapproved')
        ->get();
        return view('admin.manageReservation',compact('nonapprovedk'));
        
    }
    public function change($id){
       
        $reservation=Reservation::find($id);
        if($reservation->status=='In-Progress'){
        $reservation->status='approved';
        $mess='reservation has approved';
        return(view('admin.manageReservation',['mess'=>$mess]));
    
    }
        else 
        $reservation->status='nonapproved';{
        $mess='reservation has refused';
        return(view('admin.manageReservation',['mess'=>$mess]));}
    }
}
