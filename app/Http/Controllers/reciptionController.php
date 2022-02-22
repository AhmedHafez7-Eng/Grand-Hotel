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
        $inprogress= DB::table('reservations')
        ->where('status', 'In-Progress')
        ->get();


        $nonapproved= DB::table('reservations')
        ->where('status', 'nonapproved')
        ->get();
        return view('admin.receptionist',compact('approved','nonapproved','inprogress'));
        
    }
    public function change($id){
       
        $reservation=Reservation::find($id);

        if($reservation->status=='In-Progress'){
        $reservation->status='approved';
        $mess='reservation has approved';
        $reservation->save();
        return redirect()->route('receptionist');
       // return redirect()->route('');
    
    }
        else 
        $reservation->status='nonapproved';{
        $mess='reservation has refused';
        $reservation->save();
        return redirect()->route('receptionist');}

}
}