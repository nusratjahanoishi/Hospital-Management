<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
        public function index()
        {
            $appointments = Appointment::with(['patient', 'doctor'])->get();
            return view('layout.auth.admin.appointment.index', compact('appointments'));
        }
    
        public function create()
        {
            $doctors = User::where('role', 'doctor')->get();
            return view('layout.auth.admin.appointment.create', compact('doctors'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'doctor_id' => 'required|exists:users,id',
                'appointment_date' => 'required|date',
                'time_slot' => 'required',
            ]);
    if($request->patient_id==null){
        Appointment::create([
            'patient_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'time_slot' => $request->time_slot,
            'status' => 'pending',
        ]);
    }
    
    else{
        Appointment::create([
            'patient_id' =>$request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'time_slot' => $request->time_slot,
            'status' => 'confirmed',
        ]);
    }
           
    
            return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
        }
    
        public function status(Request $request)
        {
            $appointment = Appointment::findOrFail($request->id);
            
            $appointment->update([
                'status' => $request->status,
            ]);
        
            return redirect()->route('appointments.index')->with('success', 'Appointment status updated successfully.');
        }
        
        public function show(Appointment $appointment)
        {
            return view('layout.auth.admin.appointment.show', compact('appointment'));
        }
    
        public function update(Request $request, Appointment $appointment)
        {
            $appointment->update(['status' => $request->status]);
            return redirect()->back()->with('success', 'Appointment updated.');
        }
    
        public function destroy($id)
        {
          Appointment::find($id)->delete();
          return back()->with('success', 'Appointment cancelled.');

        }
    
    
}
