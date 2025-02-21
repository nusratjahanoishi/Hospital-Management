@extends('layout.patient')
@section('content')
<div class="grid grid-cols-3 gap-4">
    @foreach($doctors as $doctor)
        <div class="w-[400px] h-[400px] bg-white border rounded-lg shadow-lg p-4 flex flex-col items-center">
            <img src="{{ asset('doctor_images/' . $doctor?->profile_picture) }}" 
                 alt="Profile Picture" 
                 class="w-40 h-40 rounded-full object-cover">
            
            <h2 class="text-xl font-bold mt-4">{{ $doctor?->user?->name }}</h2>
            <p class="text-gray-600">{{ $doctor?->qualification }}</p>
            <p class="text-gray-600">{{ $doctor?->doctorExpart->name }}</p>

           <div class="grid grid-cols-2 gap-10 mt-12">
            <a href="{{ route('patient.doctor.appointment', $doctor->user_id) }}" 
                class="mt-auto bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Appointment 
             </a>
             <a href="{{ route('patient.doctor.profile', $doctor->user_id) }}" 
                class="mt-auto bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                View Profile
             </a>
           </div>
        </div>
    @endforeach
</div>

@endsection
