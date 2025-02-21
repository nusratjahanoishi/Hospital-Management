<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f3f4f6;
        }
    </style>
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body class="flex">

    <!-- Sidebar -->
    <div class="w-64 bg-blue-900 text-white min-h-screen p-5">
        <h2 class="text-2xl font-bold text-center mb-5">Dashboard</h2>
        <ul>
            <!-- Dynamic Sidebar Links -->
            <li class="mb-2">
                <a href="{{ url('/doctor/dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Dashboard</a>
            </li>
            @if (App\Models\Doctor::where('user_id',Auth::id())->count()==0)
            <li>
                <a href="{{ route('doctor.create')}}" class="block py-2 px-4 rounded hover:bg-blue-700">Create Profile</a>
            </li>
            @else
            <li>
                <a href="{{ route('doctor.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">View Profile</a>
            </li>
            @endif
            
            <li class="mb-2">
                <a href="{{ url('/doctor/appointments') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Appointments</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/doctor/reports') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Medical Reports</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/doctor/profile') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Profile</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/doctor/logout') }}" class="block py-2 px-4 rounded hover:bg-red-600">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Navbar -->
        <div class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Welcome, Dr. {{ Auth::user()->name ?? 'Doctor' }}</h1>
            <div class="relative group">
                <!-- Button -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                    My Profile
                </button>
        
                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <ul class="list-none">
                        @if (App\Models\Doctor::where('user_id',Auth::id())->count()==0)
                        <li>
                            <a href="{{ route('doctor.create')}}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Create Profile</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('doctor.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">View Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('doctor.edit',Auth::id())}}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Edit Profile</a>
                        </li>
                        @endif
                       
                      
                    </ul>
                </div>
            </div>
        </div>
        

        <!-- Page Content -->
        <div class="p-6">
        
            @yield('content')
        </div>
        <div id="alert-container">
            @if (session('success'))
                <div id="success-alert" class="fixed bottom-5 right-5 max-w-sm bg-green-500 text-white p-3 rounded-lg shadow-lg">
                    {{ session('success') }}
                </div>
            @endif
        
            @if (session('error'))
                <div id="error-alert" class="fixed bottom-5 right-5 max-w-sm bg-red-500 text-white p-3 rounded-lg shadow-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        
        <script>
            // Automatically remove success and error messages after 3 seconds
            setTimeout(function () {
                document.getElementById('success-alert')?.remove();
                document.getElementById('error-alert')?.remove();
            }, 10000); // Change from 500ms to 3000ms (3 seconds)
        </script>
    </div>

</body>
</html>
