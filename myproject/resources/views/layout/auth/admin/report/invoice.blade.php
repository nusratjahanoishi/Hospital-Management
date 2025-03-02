@extends('layout.admin')

@section('content')
<div class="bg-white max-w-6xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10 relative">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Report Details</h2>
        <img src="{{ asset('download.jpg') }}" alt="Hospital Logo" class="rounded-full w-32 h-32 object-cover">
        <button onclick="window.print()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 flex items-center">
            <i class="fas fa-print mr-2"></i> Print
        </button>
    </div>

    <div class="grid grid-cols-6 gap-6 mb-6">
        <!-- Patient Information (Left) -->
        <div class="border p-4 rounded-lg shadow col-span-3 text-center">
            <h3 class="text-lg font-bold mb-4">Patient Information</h3>
            <div>
                <p><strong>Name:</strong> {{ $report->patient_name }}</p>
                <p><strong>Gender:</strong> {{ $report->gender }}</p>
                <p><strong>Date of Birth:</strong> {{ $report->dob }}</p>
                <p><strong>Blood Group:</strong> {{ $report->blood_group }}</p>
            </div>
        </div>
    
        <!-- Doctor Information (Right) -->
        <div class="border p-4 rounded-lg shadow col-span-3 text-center">
            <h3 class="text-lg font-bold mb-4">Doctor Information</h3>
            <div>
                <p><strong>Doctor Name:</strong> {{ $report->doctor->name }}</p>
                <p><strong>Specialization:</strong> {{ $doctor?->doctorExpart?->name }}</p>
                <p><strong>Email:</strong> {{ $report->doctor->email }}</p>
            </div>
        </div>
    </div>
    

    <!-- Test Information and Price Table -->
    <h3 class="text-lg font-bold mb-4">Test Information and Price</h3>
    <table class="w-full border-collapse border border-gray-100">
        <thead>
            <tr class="bg-blue-500 text-white">
                <th class="border border-gray-300 px-4 py-2">Test Name</th>
                <th class="border border-gray-300 px-4 py-2">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $report?->test?->test_name }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">${{ $report?->test?->price }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
