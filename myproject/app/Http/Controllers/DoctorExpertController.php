<?php

namespace App\Http\Controllers;

use App\Models\DoctorExpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctorExpertController extends Controller
{
    public function index()
    {   
        $data['doctor_expart']=DoctorExpart::all();
        return view('layout.auth.admin.doctor_expart.List')->with($data);
    }
    public function create()
    {   
        return view('layout.auth.admin.doctor_expart.create');
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string|max:120',
            ]);
    
            $data = $request->input('id') 
                ? DoctorExpart::findOrFail($request->input('id')) 
                : new DoctorExpart();
    
            $data->name = $request->input('name');
            $data->description = $request->input('description');
            $data->save();
            return redirect()->route('doctor.position.index')->with('success', 'Doctor Expert ' . ($request->input('id') ? 'updated' : 'created') . ' successfully.');
        } catch (\Exception $e) {
            Log::error('Save failed: ' . $e->getMessage(), ['inputs' => $request->all()]);
            return back()->with('error', 'An error occurred while saving Doctor Expert: ' . $e->getMessage());
        }
    }
        public function edit($id){
        $data['data'] = DoctorExpart::where('id',$id)->first();
        return view("layout.auth.admin.doctor_expart.Edit", $data);
    }

    public function delete($id)
    {
        $setting = DoctorExpart::find($id);
        if (!$setting) {
            return redirect()->back()->with('error', 'Doctor Expart  not found.');
        }
        $setting->delete();
        return redirect()->back()->with('success', 'Doctor Expart  deleted successfully.');
    }
}
