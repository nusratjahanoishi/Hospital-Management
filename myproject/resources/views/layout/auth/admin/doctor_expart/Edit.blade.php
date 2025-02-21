@extends('layout.admin')


@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Doctor Designation Edit</h2>
        <a href="{{ route('doctor.position.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-list mr-1"></i> Index
        </a>
    </div>
    <form action="{{route('doctor.position.store')}}" method="POST">
        @csrf
        <input type="hidden" id="id" name="id" class="mt-1 p-3 w-full border rounded-lg focus:ring focus:ring-blue-300" value="{{$data->id}}">
        <div class="mb-6">
            <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="mt-1 p-3 w-full border rounded-lg focus:ring focus:ring-blue-300" value="{{$data->name}}">
        </div>
        <div class="mb-6">
            <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="5" class="mt-1 p-3 w-full border rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter description">{{$data->description}}</textarea>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 text-lg">Submit</button>
    </form>
</div>
@endsection
   