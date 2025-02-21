@extends('layout.admin')

@section('content')
<div class="w-full max-w-8xl bg-white p-5 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Doctor Designation</h2>
        <a href="{{ route('doctor.position.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-plus mr-1"></i> Add
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-100 ">
            <thead>
                <tr class="bg-blue-500 text-white text-center">
                    <th class="border border-gray-300 px-4 py-2 text-center">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Description</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctor_expart as $key => $item)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $key + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $item?->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $item?->description }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('doctor.position.edit', $item?->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            
                            <a href="{{ route('doctor.position.delete', $item?->id) }}" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center">
                                <i class="fas fa-trash mr-1"></i> Delete
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
