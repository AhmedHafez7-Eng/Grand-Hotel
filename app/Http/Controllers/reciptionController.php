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

        if($reservation->status=='In-Progress')
        {
           // if($_GET[button_value]=='approved'){
        $reservation->status='approved';
       $value='nonapproved';
        $reservation->save();
        return redirect()->route('receptionist',compact('value'));
        }
       // return redirect()->route('');
    
    
        else
        { 
        if($reservation->status=='nonapproved')
        {
        $reservation->status='approved';
            $value='nonapproved';
        $reservation->save();
        return redirect()->route('receptionist',compact('value'));
        }
        else
        {
        if($reservation->status=='approved')
        {
            $reservation->status='nonapproved';
                $value='approved';
            $reservation->save(); 
            return redirect()->route('receptionist',compact('value'));
        
        }
        
        }}
    
    }
}
