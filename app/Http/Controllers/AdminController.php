<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddDoctorRequest;

use App\Http\Requests\UpdateDoctorRequest;

use App\Models\Doctor;

use App\Models\Appointment;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    // ========================================== Doctors
    //=========== Get All Doctors
    public function show_users()
    {
        
        $users = User::all();
        // For API
        // return response()->json($doctors);
        return view('admin.show_users', compact('users'));
    }
    //=========== Redirect to Add Doctor
    // public function addDoctor()
    // {
    //     return view('admin.add_doctor');
    // }
    // //=========== Create Doctor
    // public function createDoctor(AddDoctorRequest $request)
    // {
    //     $validated = $request->validated();
    //     $validated = $request
    //         ->safe()
    //         ->only(['name', 'phone', 'spec', 'roomNo', 'docImg']);
    //     if ($validated) {
    //         $doctor = new Doctor;

    //         $image = $request->docImg;
    //         $imageName = time() . '.' . $image->getClientoriginalExtension();
    //         $request->docImg->move('doctorImg', $imageName);

    //         $doctor->image = $imageName;
    //         $doctor->name = $request->name;
    //         $doctor->phone = $request->phone;
    //         $doctor->roomNo = $request->roomNo;
    //         $doctor->specialization = $request->spec;

    //         $doctor->save();
    //         return redirect()->back()->with('message', 'Doctor Added Successfully');
    //     } else {
    //         return redirect()->back()
    //             ->withErrors($validated)
    //             ->withInput();
    //     }
    // }
    // //=========== Delete Doctor
    // public function deleteDoctor($id)
    // {
    //     $doctor = Doctor::find($id);
    //     $doctor->delete();

    //     return redirect()->back();
    // }

    // //=========== Redirect to Update Doctor page
    // public function updateDoctor($id)
    // {
    //     $doctor = Doctor::find($id);
    //     return view('admin.updateDoctor', compact('doctor'));
    // }
    // //=========== Update Doctor
    // public function edit_doctor(UpdateDoctorRequest $request, $id)
    // {
    //     $doctor = Doctor::find($id);
    //     $validated = $request->validated();
    //     $validated = $request
    //         ->safe()
    //         ->only(['name', 'phone', 'spec', 'roomNo', 'docImg']);
    //     if ($validated) {

    //         $image = $request->docImg;
    //         if ($image) {
    //             $imageName = time() . '.' . $image->getClientoriginalExtension();
    //             $request->docImg->move('doctorImg', $imageName);
    //             $doctor->image = $imageName;
    //         }
    //         if ($request->name) {
    //             $doctor->name = $request->name;
    //         }
    //         if ($request->phone) {
    //             $doctor->phone = $request->phone;
    //         }
    //         if ($request->roomNo) {
    //             $doctor->roomNo = $request->roomNo;
    //         }
    //         if ($request->spec) {
    //             $doctor->specialization = $request->spec;
    //         }

    //         $doctor->save();
    //         return redirect('show_doctors')->with('message', 'Doctor Updated Successfully');
    //     } else {
    //         return redirect()->back()
    //             ->withErrors($validated)
    //             ->withInput();
    //     }
    // }
    // // ========================================== Appointments
    // //=========== Show All Appointments
    // public function show_appointments()
    // {
    //     $appointments = Appointment::all();
    //     return view('admin.show_appointments', compact('appointments', $appointments));
    // }

    // //=========== Approve Appointment
    // public function approved($id)
    // {
    //     $appointments = Appointment::find($id);

    //     if ($appointments->status == 'In-Progress') {
    //         $appointments->status = 'Approved';
    //     } elseif ($appointments->status == 'Approved') {
    //         $appointments->status = 'In-Progress';
    //     } else {
    //         $appointments->status = 'Approved';
    //     }

    //     $appointments->save();
    //     return redirect()->back();
    // }

    // //=========== Cancel Appointment
    // public function canceled($id)
    // {
    //     $appointments = Appointment::find($id);

    //     $appointments->status = 'Canceled';
    //     $appointments->save();
    //     return redirect()->back();
    // }

    // //=========== Redirect to Send Email Page
    // public function emailNotify($id)
    // {
    //     $appointment = Appointment::find($id);
    //     return view('admin.emailNotify', compact('appointment'));
    // }

    // //=========== Send Email Notification
    // public function sendEmail(Request $request, $id)
    // {
    //     $appointment = Appointment::find($id);

    //     $details = [
    //         'greeting' => $request->greeting,
    //         'body' => $request->body,
    //         'actionText' => $request->actionText,
    //         'actionURL' => $request->actionURL,
    //         'endPart' => $request->endPart
    //     ];

    //     Notification::send($appointment, new EmailNotification($details));

    //     return redirect('show_appointments')->with('message', 'Email Notification Sent Successfully');
    // }
}