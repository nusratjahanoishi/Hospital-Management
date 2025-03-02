<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorExpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    public function index()
    {
        $data['doctor'] = Doctor::where('user_id', Auth::id())->first();
        return view('layout.auth.doctor.doctor_profile')->with($data);
    }
    public function create()
    {
        $data['doctor_expart'] = DoctorExpart::all();
        return view('layout.auth.doctor.create')->with($data);
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'gender' => 'required|in:male,female,other',
                'dob' => 'required|date',
                'blood_group' => 'nullable',
                'nationality' => 'nullable|string|max:255',
                'specialization_id' => 'required',
                'medical_reg_no' => 'required|string|max:255',
                'qualification' => 'required|in:MBBS,MD,DO,DM,MS,PhD,Diplomas & Fellowships',
                'experience' => 'required|integer|min:0',
                'myself' => 'nullable|string',
            ]);


            $data = $request->input('id')
            // Update mode
            ? ( Doctor::where('user_id', $request->user_id)
                      ->where('id', '!=', $request->input('id'))
                      ->count()
                  ? redirect()->route('doctor.create')->with('error', 'A doctor profile with this user id already exists.')
                  : Doctor::findOrFail($request->input('id')) )
            // Insert mode
            : ( Doctor::where('user_id', $request->user_id)->count()
                  ? redirect()->route('doctor.create')->with('error', 'A doctor profile with this user id already exists.')
                  : new Doctor() );
        

            if ($request->hasFile('profile_picture')) {
                $image = $request->file('profile_picture');
                $imagename = time() . '_doctor.' . $image->getClientOriginalExtension();

                if (!empty($data->profile_picture) && file_exists(public_path('doctor_images/' . $data->profile_picture))) {
                    unlink(public_path('doctor_images/' . $data->profile_picture));
                }

                $image->move(public_path('doctor_images'), $imagename);

                $data->profile_picture = $imagename;
            }
            $data->user_id = $request->user_id;
            $data->gender = $validated['gender'];
            $data->dob = $validated['dob'];
            $data->blood_group = $validated['blood_group'];
            $data->nationality = $validated['nationality'];
            $data->specialization_id = $validated['specialization_id'];
            $data->medical_reg_no = $validated['medical_reg_no'];
            $data->qualification = $validated['qualification'];
            $data->experience = $validated['experience'];
            $data->myself = $validated['myself'];

            $data->save();

            return redirect()->route('doctor.index')->with('success', 'Doctor Profile ' . ($request->input('id') ? 'updated' : 'created') . ' successfully.');
        } catch (\Exception $e) {
            Log::error('Save failed: ' . $e->getMessage(), ['inputs' => $request->all()]);
            return back()->with('error', 'An error occurred while saving Doctor Profile: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data['doctor_expart'] = DoctorExpart::all();
        $data['data'] = Doctor::where('user_id', $id)->first();
        return view("layout.auth.doctor.edit", $data);
    }

    public function delete($id)
    {
        $setting =Doctor::find($id);
        if (!$setting) {
            return redirect()->back()->with('error', 'Doctor Profile  not found.');
        }
        $setting->delete();
        return redirect()->back()->with('success', 'Doctor Profile  deleted successfully.');
    }
}
