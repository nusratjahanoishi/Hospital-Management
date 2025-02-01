<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>

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
            <li class="mb-2">
                <a href="{{ url('/doctor/patients') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Patients</a>
            </li>
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
            <a href="{{ url('/doctor/profile') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">My Profile</a>
        </div>

        <!-- Page Content -->
        <div class="p-6">
            <table>
                <thead>
                    <caption class="mt-2 mb-3"><h2>Doctor List</h2></caption>
                    <tr>
                        <th>#SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($response as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td> <!-- Capitalize first letter -->
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
            @yield('content')
        </div>
    </div>

</body>
</html>
