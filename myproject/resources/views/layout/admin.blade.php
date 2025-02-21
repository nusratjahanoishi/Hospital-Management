<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <!-- Toastr JS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Include Chosen CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

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

        th,
        td {
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
        <h2 class="text-2xl font-bold text-center mb-5">Admin Panel</h2>
        <ul>
            <!-- Admin-specific Sidebar Links -->
            <li class="mb-2">
                <a href="{{ url('/admin/dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="{{ route('doctor.position.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Doctor
                    Expert</a>
            </li>
            <li class="mb-2">
                <a href="{{ route('appointments.index') }}"
                    class="block py-2 px-4 rounded hover:bg-blue-700">Appointments</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/admin/reports') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Reports</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/admin/settings') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Settings</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/admin/logout') }}" class="block py-2 px-4 rounded hover:bg-red-600">Logout</a>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="flex-1">
        <!-- Navbar -->
        <div class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Welcome, Admin {{ Auth::user()->name ?? 'Admin' }}</h1>
            <a href="{{ url('/admin/profile') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">My
                Profile</a>
        </div>

        <!-- Page Content -->


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
        }, 1000); // Change from 500ms to 3000ms (3 seconds)
    </script>
    
</body>

</html>
