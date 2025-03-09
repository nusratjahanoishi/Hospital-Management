<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        /* Navbar Styling */
        .navbar {
            background: linear-gradient(90deg, #1E3A8A, #2563EB);
            color: white;
            padding: 15px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar h1 {
            font-size: 1.5rem;
        }
        .navbar a {
            background: white;
            color: #2563EB;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }
        .navbar a:hover {
            background: #2563EB;
            color: white;
        }
        /* Sidebar Hover Effects */
        .sidebar li a {
            transition: background 0.3s, transform 0.2s;
        }
        .sidebar li a:hover {
            background-color: #1E40AF;
            transform: scale(1.05);
        }
        /* Button Hover Effects */
        .btn {
            transition: background 0.3s, transform 0.2s;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        /* Footer Styling */
        .footer {
            background: #1E3A8A;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <div class="navbar flex justify-between items-center">
        <h1>Welcome, Admin {{ Auth::user()->name ?? 'Admin' }}</h1>
        <a href="#" class="btn">My Profile</a>
    </div>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white min-h-screen p-5 sidebar">
            <h2 class="text-2xl font-bold text-center mb-5">Admin Panel</h2>
            <ul>
                <li class="mb-2"><a href="{{ url('/admin/dashboard') }}" class="block py-2 px-4 rounded">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('doctor.position.index') }}" class="block py-2 px-4 rounded">Doctor Expert</a></li>
                <li class="mb-2"><a href="{{ route('appointments.create') }}" class="block py-2 px-4 rounded">Appointment</a></li>
                <li class="mb-2"><a href="{{ route('appointments.index') }}" class="block py-2 px-4 rounded">Appointments List</a></li>
                <li class="mb-2"><a href="{{ route('admin.test.index') }}" class="block py-2 px-4 rounded">Test</a></li>
                <li class="mb-2"><a href="{{ route('admin.report.index') }}" class="block py-2 px-4 rounded">Reports</a></li>
                <li class="mb-2"><a href="{{ url('/admin/logout') }}" class="block py-2 px-4 rounded bg-red-600 hover:bg-red-700">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Page Content -->
            <div class="flex-1 p-6">@yield('content')</div>
        </div>
    </div>

  <!-- Footer -->
  <footer class="mt-10 bg-blue-900 text-white text-center py-8">
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-4">
            <h3 class="text-2xl font-semibold">HealthPoint</h3>
            <p class="text-sm">Your trusted healthcare partner</p>
        </div>

        <div class="flex justify-center gap-6 mb-6">
            <a href="https://facebook.com" class="text-white hover:text-gray-300">
                <i class="fab fa-facebook-f text-xl"></i>
            </a>
            <a href="https://twitter.com" class="text-white hover:text-gray-300">
                <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="https://instagram.com" class="text-white hover:text-gray-300">
                <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="https://linkedin.com" class="text-white hover:text-gray-300">
                <i class="fab fa-linkedin-in text-xl"></i>
            </a>
        </div>

        <p class="text-sm">
            Email: <a href="mailto:healthpoint@gmail.com" class="hover:underline">healthpoint@gmail.com</a> | Address:West Rampura ,Ulon Road, Dhaka-1204, Bangladesh
        </p>
    </div>

    <div class="mt-6 text-sm">
        <p>&copy; 2025 HealthPoint. All rights reserved.</p>
    </div>
</footer>



</body>
</html>

