@extends('layout.patient')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Doctor Appointment</h2>
      
        <a href="{{ route('patient.doctor.index') }}" class="btn btn-primary"> <i class="fas fa-list mr-1"></i> Doctor List</a>
    </div>
    <table class="table mt-4">
        <tr>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        @foreach($appointment_list as $appointment)
        <tr>
            <td>{{ $appointment->patient->name }}</td>
            <td>{{ $appointment->doctor->name }}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->time_slot }}</td>
            <td>{{ ucfirst($appointment->status) }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
