@extends('layout.patient')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Appointment Information</h2>
        <a href="{{ route('patient.doctor.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-list mr-1"></i> Doctor List
        </a>
    </div>
    <form action="{{ route('patient.appointment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="w-full mb-6 border">
            <tr>
                <td><label for="patient_id" class="font-medium">Patient Name</label></td>
                <td><input type="" id="patient_id" name="" class="p-2 w-full border rounded-lg" value="{{ Auth::user()->name ?? 'Patient' }}" readonly>
                <input type="hidden" id="patient_id" name="patient_id" class="p-2 w-full border rounded-lg" value="{{ Auth::user()->id ?? 'Patient' }}">
                <input type="hidden" id="defult_id" name="defult_id" class="p-2 w-full border rounded-lg" value="{{ Auth::user()->id}}">
            </td>
            </tr>
            <tr>
                <td><label for="doctor_id" class="font-medium">Doctor Name</label></td>
                <td><input type="" id="doctor_id" name="" class="p-2 w-full border rounded-lg" value="{{$doctor->user->name}}" readonly>
                <input type="hidden" id="doctor_id" name="doctor_id" class="p-2 w-full border rounded-lg" value="{{$doctor->user_id}}"></td>
            </tr>
            <tr>
                <td><label for="full_name" class="font-medium">Appointment Date</label></td>
                <td> <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="{{ old('appointment_date') }}" required> <small>Format: MM:DD:YYYY </small></td>
            </tr>
            <tr>
                <td>
                <label for="time_slot">Time Slot</label></td>
                <td><input type="time" name="time_slot" id="time_slot" class="form-control" value="{{ old('time_slot') }}" placeholder="HH:MM AM"  required>
                    <small>Format: HH:MM AM/PM</small></td>
            </tr>
           
        </table>
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 text-lg">Book Appointment</button>
    </form>
</div>

@endsection
