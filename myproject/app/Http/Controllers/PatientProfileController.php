<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PatientProfileController extends Controller
{
    public function index()
    {
        $data['patient'] = Patient::where('user_id', Auth::id())->first();
        return view('layout.auth.patient.profile.patient_profile')->with($data);
    }
    public function create()
    {
        return view('layout.auth.patient.profile.create');
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
                'myself' => 'nullable|string',
            ]);


            $data = $request->input('id')
            ? ( Patient::where('user_id', $request->user_id)
                      ->where('id', '!=', $request->input('id'))
                      ->count()
                  ? redirect()->route('patient.create')->with('error', 'A patient profile with this user id already exists.')
                  : Patient::findOrFail($request->input('id')) )
            : ( Patient::where('user_id', $request->user_id)->count()
                  ? redirect()->route('patient.create')->with('error', 'A patient profile with this user id already exists.')
                  : new Patient() );
        

            if ($request->hasFile('profile_picture')) {
                $image = $request->file('profile_picture');
                $imagename = time() . '_patient.' . $image->getClientOriginalExtension();

                if (!empty($data->profile_picture) && file_exists(public_path('patient_images/' . $data->profile_picture))) {
                    unlink(public_path('patient_images/' . $data->profile_picture));
                }

                $image->move(public_path('patient_images'), $imagename);

                $data->profile_picture = $imagename;
            }
            $data->user_id = $request->user_id;
            $data->gender = $validated['gender'];
            $data->dob = $validated['dob'];
            $data->blood_group = $validated['blood_group'];
            $data->nationality = $validated['nationality'];
            $data->myself = $validated['myself'];

            $data->save();

            return redirect()->route('patient.index')->with('success', 'Patient Profile ' . ($request->input('id') ? 'updated' : 'created') . ' successfully.');
        } catch (\Exception $e) {
            Log::error('Save failed: ' . $e->getMessage(), ['inputs' => $request->all()]);
            return back()->with('error', 'An error occurred while saving Patient Profile: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data['data'] = Patient::where('user_id', $id)->first();
        return view("layout.auth.patient.profile.edit", $data);
    }

    public function delete($id)
    {
        $setting = Patient::find($id);
        if (!$setting) {
            return redirect()->back()->with('error', 'Patient  not found.');
        }
        $setting->delete();
        return redirect()->back()->with('success', 'Patient  deleted successfully.');
    }
}
