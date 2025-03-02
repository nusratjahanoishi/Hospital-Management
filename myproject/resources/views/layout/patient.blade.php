<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Poppins', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #6D28D9;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="flex">

    <!-- Sidebar -->
    <div class="w-64 bg-purple-900 text-white min-h-screen p-5 shadow-xl">
        <h2 class="text-2xl font-bold text-center mb-5">Patient Panel</h2>
        <ul>
            <li class="mb-2">
                <a href="{{ url('/patient/dashboard') }}" class="block py-3 px-4 rounded-lg hover:bg-purple-700 transition">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="{{route('patient.doctor.index') }}" class="block py-3 px-4 rounded-lg hover:bg-purple-700 transition">Doctors</a>
            </li>
            <li class="mb-2">
                <a href="{{ route('patient.appointment.list',Auth::user()->id) }}" class="block py-3 px-4 rounded-lg hover:bg-purple-700 transition">Appointment Schedule</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/patient/profile') }}" class="block py-3 px-4 rounded-lg hover:bg-purple-700 transition">Profile</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/logout') }}" class="block py-3 px-4 rounded-lg hover:bg-red-600 transition">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Navbar -->
        <div class="bg-white shadow-md py-4 px-6 flex justify-between items-center border-b">
            <h1 class="text-xl font-semibold text-purple-800">Welcome, {{ Auth::user()->name ?? 'Patient' }}</h1>
            <a href="{{ url('/patient/profile') }}" class="bg-purple-600 text-white px-5 py-2 rounded-lg hover:bg-purple-700 transition">My Profile</a>
        </div>

        <!-- Page Content -->
        <div class="p-6">
            @yield('content')
        </div>
        
        <div id="alert-container">
            @if (session('success'))
                <div id="success-alert" class="fixed bottom-5 right-5 max-w-sm bg-green-500 text-white p-4 rounded-lg shadow-lg fade-in">
                    {{ session('success') }}
                </div>
            @endif
        
            @if (session('error'))
                <div id="error-alert" class="fixed bottom-5 right-5 max-w-sm bg-red-500 text-white p-4 rounded-lg shadow-lg fade-in">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>
