<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Reservation;
class reciptionController extends Controller
{
    //
    public function showapproved(){
        $approved= Reservation::where('status', 'approve')->get();
        $inprogress=Reservation::where('status', 'In-Progress')->get(); 
        $nonapproved=Reservation::where('status', 'nonapproved')->get(); 
        return view('admin.receptionist',compact('approved','nonapproved','inprogress'));
        
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
