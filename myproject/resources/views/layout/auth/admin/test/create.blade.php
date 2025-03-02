@extends('layout.admin')

@section('content')
<div class="bg-white max-w-4xl mx-auto p-8 rounded-lg shadow-lg w-full mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Test Create</h2>
        <a href="{{ route('admin.test.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-list mr-1"></i> Index
        </a>
    </div>
    <form action="{{route('admin.test.store')}}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-lg font-medium text-gray-700">Test Name</label>
            <input type="text" id="name" name="test_name" class="mt-1 p-3 w-full border rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter your name">
        </div>
        <div class="mb-6">
            <label for="price" class="block text-lg font-medium text-gray-700">Test Price</label>
            <input type="number" id="price" name="price" class="mt-1 p-3 w-full border rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter Price">
        </div>
        <div class="mb-6">
            <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="5" class="mt-1 p-3 w-full border rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter description"></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 text-lg">Submit</button>
    </form>
</div>

@endsection
