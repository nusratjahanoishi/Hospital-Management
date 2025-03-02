@extends('layout.admin')
@section('content')
<div class="w-full max-w-8xl bg-white p-5 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Report List</h2>
        <a href="{{ route('admin.report.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-plus mr-1"></i> Add
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-100">
            <thead>
                <tr class="bg-blue-500 text-white text-center">
                    <th class="border border-gray-300 px-4 py-2 text-center">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Patient Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Gender</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Date of Birth</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Blood Group</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Doctor Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Test Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $key => $item)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $key + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $item?->patient_name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $item?->gender }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $item?->dob }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $item?->blood_group }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ optional($item->doctor)->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ optional($item->test)->test_name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center"> <form method="POST" action="{{ route('admin.report.status') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <select 
                            name="status" 
                            class="w-full px-3 py-2 border rounded text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            onchange="this.form.submit()">
                            <option value="Pending" {{ $item->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ $item->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Canceled" {{ $item->status === 'Canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </form></td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('admin.report.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            
                            <a href="{{ route('admin.report.delete', $item->id) }}" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </a>
                            <a href="{{ route('admin.report.invoice', $item->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 flex items-center">
                                <i class="fas fa-file-invoice mr-1"></i> Invoice
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection
