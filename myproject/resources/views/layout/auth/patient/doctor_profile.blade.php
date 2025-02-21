@extends('layout.patient')
@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <!-- Centering the content with full height -->
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl flex flex-col items-center">
        <div class="text-center">
            <!-- Profile Picture -->
            <img src="{{ asset('doctor_images/' . $doctor?->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 mx-auto rounded-full border-4 border-blue-500">
            <h2 class="text-3xl font-semibold mt-4 text-gray-800">{{ $doctor?->user->name }}</h2>
            <p class="text-gray-600 text-lg">{{ $doctor?->doctorExpart->name }}</p>
        </div>
        
        <div class="mt-8 w-full text-gray-700">
            <!-- Profile Details -->
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left font-semibold text-gray-800">Attribute</th>
                            <th class="py-2 px-4 text-left font-semibold text-gray-800">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Qualification -->
                        <tr>
                            <td class="py-2 px-4 border-t text-gray-800">Qualification</td>
                            <td class="py-2 px-4 border-t text-gray-600">{{ $doctor?->qualification }}</td>
                        </tr>
                
                        <!-- Experience -->
                        <tr>
                            <td class="py-2 px-4 border-t text-gray-800">Experience</td>
                            <td class="py-2 px-4 border-t text-gray-600">{{ $doctor?->experience }} Years</td>
                        </tr>
                
                        <!-- About Me -->
                        <tr>
                            <td class="py-2 px-4 border-t text-gray-800 font-semibold">About Me</td>
                            <td class="py-2 px-4 border-t text-gray-600">{{ $doctor?->myself }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        
        <!-- Back and Edit Buttons -->
        <div class="mt-8 w-full flex justify-between">
            <a href="{{ route('patient.doctor.index') }}" class="text-blue-500 hover:underline text-lg">Back</a>
        </div>
    </div>
</div>
@endsection
