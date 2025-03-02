@extends('layout.patient')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Patient Profile Create</h2>
        <a href="{{ route('patient.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-list mr-1"></i> Index
        </a>
    </div>
    <form action="{{ route('patient.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Basic Information Table -->
        <h3 class="text-lg font-bold mb-2">Basic Information</h3>
        <table class="w-full mb-6 border">
            <tr>
             <input type="hidden" id="user_id" name="user_id" value=" {{ Auth::user()->id ?? 'Patient' }}" class="p-2 w-full border rounded-lg" required>
            </tr>
            <tr>
                <td><label for="profile_picture" class="font-medium">Profile Picture</label></td>
                <td><input type="file" id="profile_picture" name="profile_picture" class="p-2 w-full border rounded-lg"></td>
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
            <tr>
                <td><label for="nationality" class="font-medium">Nationality</label></td>
                <td><input type="text" id="nationality" name="nationality" class="p-2 w-full border rounded-lg"></td>
            </tr>
            <tr>
                <td><label for="myself" class="font-medium">My Self</label></td>
                <td><textarea id="myself" name="myself" class="p-2 w-full border rounded-lg"></textarea></td>
            </tr>
        </table>
        
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 text-lg">Submit</button>
    </form>
</div>

@endsection
