@extends('layout.patient')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Patient Profile Edit</h2>
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
             <input type="hidden" id="id" name="id" value=" {{ $data->id}}" class="p-2 w-full border rounded-lg" required>
             <input type="hidden" id="user_id" name="user_id" value=" {{ $data->user_id}}" class="p-2 w-full border rounded-lg" required>
            </tr>
            <tr>
                <td><label for="profile_picture" class="font-medium">Profile Picture</label></td>
                <td class="flex items-center space-x-4">
                    @if(isset($data->profile_picture) && $data->profile_picture)
                        <img src="{{ asset('patient_images/' . $data->profile_picture) }}" alt="Profile Picture" class="w-12 h-12 rounded-full object-cover">
                    @endif
                    <input type="file" id="profile_picture" name="profile_picture" class="p-2 border rounded-lg">
                </td>
            </tr>
            
            <tr>
                <tr>
                    <td><label for="gender" class="font-medium">Gender</label></td>
                    <td>
                        <select id="gender" name="gender" class="p-2 w-full border rounded-lg" required>
                            <option value="male" {{ (isset($data) && $data->gender == 'male') ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ (isset($data) && $data->gender == 'female') ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ (isset($data) && $data->gender == 'other') ? 'selected' : '' }}>Other</option>
                        </select>
                    </td>
                </tr>
                
            </tr>
            <tr>
                <td><label for="dob" class="font-medium">Date of Birth</label></td>
                <td><input type="date" id="dob" name="dob" class="p-2 w-full border rounded-lg" value="{{$data->dob}}"></td>
            </tr>
            <tr>
                <td><label for="blood_group" class="font-medium">Blood Group</label></td>
                <td><input type="text" id="blood_group" name="blood_group" class="p-2 w-full border rounded-lg" value="{{$data->blood_group}}"></td>
            </tr>
            <tr>
                <td><label for="nationality" class="font-medium">Nationality</label></td>
                <td><input type="text" id="nationality" name="nationality" class="p-2 w-full border rounded-lg" value="{{$data->nationality}}"></td>
            </tr>
            <tr>
                <td><label for="myself" class="font-medium">My Self</label></td>
                <td><textarea id="myself" name="myself" class="p-2 w-full border rounded-lg"> {{$data->myself}}</textarea></td>
            </tr>
        </table>
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 text-lg">Submit</button>
    </form>
</div>

@endsection