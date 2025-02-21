<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class PatientController extends Controller
{
    public function index()
    {
        $data['doctors'] = Doctor::All();
        return view('layout.auth.patient.doctorlist')->with($data);
    }
    public function list($id)
    {
        $data['appointment_list'] = Appointment::where('patient_id',$id)->get();
        return view('layout.auth.patient.appointment_list')->with($data);
    }
    public function doctor_profile($user_id)
    {
        $data['doctor'] = Doctor::where('user_id',$user_id)->first();
        return view('layout.auth.patient.doctor_profile')->with($data);
    }
    public function appointment($user_id)
    {
        $data['doctor'] = Doctor::where('user_id',$user_id)->first();
        return view('layout.auth.patient.create')->with($data);
    }
    public function store(Request $request)
    {
        try {
           $role= User::find($request->defult_id);
            $validated = $request->validate([
                'patient_id' => 'required',
                'doctor_id' => 'required',
                'appointment_date' => 'required',
                'time_slot' => 'required',
            ]);
            $data = $request->input('id') 
            ? Appointment::findOrFail($request->input('id')) 
            : new Appointment();

            $data->patient_id = $validated['patient_id'];
            $data->doctor_id = $validated['doctor_id'];
            $data->appointment_date = $validated['appointment_date'];
            $data->time_slot = $validated['time_slot'];
            if($role->role='patient')
            $data->status ='pending';
        else
        $data->status ='confirmed';
            $data->save();

            return redirect()->route('patient.doctor.index')->with('success', 'Appointment' . ($request->input('id') ? 'updated' : 'created') . ' successfully.');
        } catch (\Exception $e) {
            Log::error('Save failed: ' . $e->getMessage(), ['inputs' => $request->all()]);
            return back()->with('error', 'An error occurred while saving Appointment: ' . $e->getMessage());
        }
    }



}
