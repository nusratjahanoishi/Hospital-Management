<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorExpart;
use App\Models\Report;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data['reports'] = Report::all();
        return view('layout.auth.admin.report.list')->with($data);
    }
    public function create()
    {
        $data['doctor'] = User::where('role', 'doctor')->get();
        $data['test'] = Test::all();
        return view('layout.auth.admin.report.create')->with($data);
    }
    public function store(Request $request)
    {
        try {
            
            $data = $request->input('id') 
                ? Report::findOrFail($request->input('id')) 
                : new Report();
        
            $data->patient_name = $request->patient_name;
            $data->gender = $request->gender;
            $data->dob = $request->dob;
            $data->blood_group = $request->blood_group;
            $data->doctor_id = $request->doctor_id;
            $data->test_id = $request->test_id;
            $data->test_date = $request->test_date;
            $data->status = 'Pending';
        
            // Save the record
            $data->save();
        
            return redirect()->route('admin.report.index')
                ->with('success', 'Report' . ($request->input('id') ? 'updated' : 'created') . ' successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
        
    }
    public function edit($id)
    {
        $data['report'] = Report::find($id);
        $data['doctor'] = User::where('role', 'doctor')->get();
        $data['test'] = Test::all();
        return view("layout.auth.admin.report.edit", $data);
    }
    public function invoice($id)
    {
        $data['report'] = Report::find($id);
        $doctor_id=$data['report']->doctor_id;
        $data['doctor'] = Doctor::where('user_id', $doctor_id)->first();
        return view("layout.auth.admin.report.invoice", $data);
    }

    public function delete($id)
    {
        $setting =Report::find($id);
        if (!$setting) {
            return redirect()->back()->with('error', 'Report not found.');
        }
        $setting->delete();
        return redirect()->back()->with('success', 'Report deleted successfully.');
    }

    public function status(Request $request)
    {
        $report = Report::findOrFail($request->id);
        
        $report->update([
            'status' => $request->status,
        ]);
    
        return redirect()->route('admin.report.index')->with('success', 'Report status updated successfully.');
    }
}
