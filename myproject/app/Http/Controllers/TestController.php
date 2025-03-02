<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class TestController extends Controller
{
    public function index()
    {   
        $data['tests']=Test::all();
        return view('layout.auth.admin.test.List')->with($data);
    }
    public function create()
    {   
        return view('layout.auth.admin.test.create');
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'test_name' => 'required|string|max:100',
                'description' => 'nullable|string|max:120',
                'price' => 'nullable',
            ]);
    
            $data = $request->input('id') 
                ? Test::findOrFail($request->input('id')) 
                : new Test();
    
            $data->test_name = $request->input('test_name');
            $data->description = $request->input('description');
            $data->price = $request->input('price');
            $data->save();
            return redirect()->route('admin.test.index')->with('success', 'Test' . ($request->input('id') ? 'updated' : 'created') . ' successfully.');
        } catch (\Exception $e) {
            Log::error('Save failed: ' . $e->getMessage(), ['inputs' => $request->all()]);
            return back()->with('error', 'An error occurred while saving Test ' . $e->getMessage());
        }
    }
        public function edit($id){
        $data['data'] = Test::where('id',$id)->first();
        return view("layout.auth.admin.test.Edit", $data);
    }

    public function delete($id)
    {
        $setting = Test::find($id);
        if (!$setting) {
            return redirect()->back()->with('error', 'Test  not found.');
        }
        $setting->delete();
        return redirect()->back()->with('success', 'Test  deleted successfully.');
    }
}
