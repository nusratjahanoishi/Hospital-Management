@extends('layout.doctor')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Create Doctor Profile</h2>
        <a href="{{ route('doctor.index') }}" class="bg-green-800 text-white px-5 py-3 rounded-md hover:bg-green-900 flex items-center text-sm font-medium">
            <i class="fas fa-list mr-2"></i> Doctor Index
        </a>
    </div>

    <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Basic Information Section -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Basic Information</h3>
            <table class="w-full text-left border border-gray-300">
                <tr>
                    <input type="hidden" id="user_id" name="user_id" value=" {{ Auth::user()->id ?? 'Doctor' }}" class="p-3 w-full border border-gray-300 rounded-lg">
                </tr>
                <tr>
                    <td class="p-4"><label for="profile_picture" class="font-medium text-gray-700">Profile Picture</label></td>
                    <td class="p-4"><input type="file" id="profile_picture" name="profile_picture" class="p-3 w-full border border-gray-300 rounded-lg"></td>
                </tr>
                <tr>
                    <td class="p-4"><label for="gender" class="font-medium text-gray-700">Gender</label></td>
                    <td class="p-4">
                        <select id="gender" name="gender" class="p-3 w-full border border-gray-300 rounded-lg" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="p-4"><label for="dob" class="font-medium text-gray-700">Date of Birth</label></td>
                    <td class="p-4"><input type="date" id="dob" name="dob" class="p-3 w-full border border-gray-300 rounded-lg" required></td>
                </tr>
                <tr>
                    <td class="p-4"><label for="blood_group" class="font-medium text-gray-700">Blood Group</label></td>
                    <td class="p-4"><input type="text" id="blood_group" name="blood_group" class="p-3 w-full border border-gray-300 rounded-lg"></td>
                </tr>
                <tr>
                    <td class="p-4"><label for="nationality" class="font-medium text-gray-700">Nationality</label></td>
                    <td class="p-4"><input type="text" id="nationality" name="nationality" class="p-3 w-full border border-gray-300 rounded-lg"></td>
                </tr>
            </table>
        </div>

        <!-- Professional Information Section -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Professional Information</h3>
            <table class="w-full text-left border border-gray-300">
                <tr>
                    <td class="p-4"><label for="specialization_id" class="font-medium text-gray-700">Specialization</label></td>
                    <td class="p-4">
                        <select id="specialization_id" name="specialization_id" class="p-3 w-full border border-gray-300 rounded-lg" required>
                            @foreach ($doctor_expart as $item )
                            <option value="{{$item?->id}}">{{$item?->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="p-4"><label for="medical_reg_no" class="font-medium text-gray-700">Medical Registration Number</label></td>
                    <td class="p-4"><input type="text" id="medical_reg_no" name="medical_reg_no" class="p-3 w-full border border-gray-300 rounded-lg" required></td>
                </tr>
                <tr>
                    <td class="p-4"><label for="qualification" class="font-medium text-gray-700">Qualification</label></td>
                    <td class="p-4">
                        <select id="qualification" name="qualification" class="p-3 w-full border border-gray-300 rounded-lg" required>
                            <option value="MBBS">MBBS (Bachelor of Medicine, Bachelor of Surgery)</option>
                            <option value="MD">MD (Doctor of Medicine)</option>
                            <option value="DO">DO (Doctor of Osteopathic Medicine)</option>
                            <option value="DM">DM (Doctorate of Medicine in a specialized field)</option>
                            <option value="MS">MS (Master of Surgery)</option>
                            <option value="PhD">PhD (Doctor of Philosophy in a medical-related field)</option>
                            <option value="Diplomas & Fellowships">Diplomas & Fellowships</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="p-4"><label for="experience" class="font-medium text-gray-700">Experience (Years)</label></td>
                    <td class="p-4"><input type="number" id="experience" name="experience" class="p-3 w-full border border-gray-300 rounded-lg" required></td>
                </tr>
                <tr>
                    <td class="p-4"><label for="myself" class="font-medium text-gray-700">About Me</label></td>
                    <td class="p-4"><textarea id="myself" name="myself" class="p-3 w-full border border-gray-300 rounded-lg"></textarea></td>
                </tr>
            </table>
        </div>

        <!-- Submit Button -->
        <div class="mb-6">
            <button type="submit" class="w-full bg-green-800 text-white p-4 rounded-lg hover:bg-green-900 text-lg">Submit</button>
        </div>
    </form>
</div>
@endsection
