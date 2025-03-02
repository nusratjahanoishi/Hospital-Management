@extends('layout.admin')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Report Create</h2>
        <a href="{{ route('admin.report.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-list mr-1"></i> Index
        </a>
    </div>
    <form action="{{ route('admin.report.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Basic Information Table -->
        <h3 class="text-lg font-bold mb-2">Patient  Information</h3>
        <table class="w-full mb-6 border">
            <tr>
                <td><label for="patient_name" class="font-medium">Patient Name</label></td>
                <td><input type="text" id="patient_name" name="patient_name" class="p-2 w-full border rounded-lg"></td>
            </tr>
            <tr>
                <td><label for="gender" class="font-medium">Gender</label></td>
                <td>
                    <select id="gender" name="gender" class="p-2 w-full border rounded-lg" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="dob" class="font-medium">Date of Birth</label></td>
                <td><input type="date" id="dob" name="dob" class="p-2 w-full border rounded-lg" required></td>
            </tr>
            <tr>
                <td><label for="blood_group" class="font-medium">Blood Group</label></td>
                <td><input type="text" id="blood_group" name="blood_group" class="p-2 w-full border rounded-lg"></td>
            </tr>
           
        </table>
        
        <!-- Professional Information Table -->
        <h3 class="text-lg font-bold mb-2">Other Information</h3>
        <table class="w-full mb-6 border">
            <tr>
                <td><label for="doctor_id" class="font-medium">Doctor name</label></td>
                <td>
                    <select id="doctor_id" name="doctor_id" class="p-2 w-full border rounded-lg" required>
                        @foreach ($doctor as $item )
                        <option value="{{$item?->id}}">{{$item?->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="date" class="font-medium">Test Date </label></td>
                <td><input type="date" id="test_date" name="test_date" class="p-2 w-full border rounded-lg"></td>
            </tr>
           
            <tr>
                <td><label for="test_id" class="font-medium">Test name</label></td>
                <td>
                    <select id="test_id" name="test_id" class="p-2 w-full border rounded-lg" required>
                        @foreach ($test as $item )
                        <option value="{{$item?->id}}">{{$item?->test_name}}</option>
                        @endforeach
                      
                    </select>
                </td>
            </tr>
        </table>
        
        <!-- Additional Information Table -->
        
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 text-lg">Submit</button>
    </form>
</div>

@endsection
