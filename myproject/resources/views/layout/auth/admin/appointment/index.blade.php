@extends('layout.admin')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Doctor Designation Create</h2>
      
        <a href="{{ route('appointments.create') }}" class="btn btn-primary"> <i class="fas fa-list mr-1"></i> Book Appointment</a>
    </div>
    <table class="table mt-4">
        <tr>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->doctor->name }}</td>
            <td>{{ $appointment->patient->name??$appointment->patient_id}}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->time_slot }}</td>
            <td>
                <form method="POST" action="{{ route('appointments.status') }}">
                    @csrf
                    <!-- Hidden field to pass the appointment ID -->
                    <input type="hidden" name="id" value="{{ $appointment->id }}">
                    <select 
                        name="status" 
                        class="w-full px-3 py-2 border rounded text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                        onchange="this.form.submit()">
                        <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $appointment->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </td>
            
            <td class="text-center">
                <a href="{{ route('appointments.delete', $appointment->id) }}" class="px-4 py-2 text-center text-white bg-red-600 hover:bg-red-700 rounded">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
</div>

@endsection
