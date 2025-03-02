@extends('layout.admin')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Doctor Appointment Booking</h2>
    </div>

    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-600 font-medium">Select Doctor:</label>
            <select name="doctor_id" id="chosen-select1" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Appointment Date -->
        <div>
            <label class="block text-gray-600 font-medium">Appointment Date:</label>
            <input type="date" name="appointment_date" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
        </div>
        <div>
            <input type="hidden" name="patient_id" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" value="{{ random_int(10000000, 999999999) }}">
        </div>

        <!-- Time Slot -->
        <div>
            <label class="block text-gray-600 font-medium">Time Slot:</label>
            <input type="text" name="time_slot" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required placeholder="e.g., 10:30 AM - 11:00 AM">
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition duration-300">
                <i class="fas fa-calendar-check mr-1"></i> Book Appointment
            </button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#chosen-select").chosen({width: "100%"});
    });
</script>
<script>
    $(document).ready(function () {
        $("#chosen-select1").chosen({width: "100%"});
    });
</script>
@endsection
