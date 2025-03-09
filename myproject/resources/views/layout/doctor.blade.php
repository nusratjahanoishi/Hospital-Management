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

    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Arial', sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background: #1E3A8A;
            color: white;
            min-height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px 15px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            transition: all 0.3s ease-in-out;
        }

        .main-content:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #4F46E5, #6B7280);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Page Content Box */
        .page-content {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 24px;
            background-color: #fafafa;
        }

        /* Card Styling */
        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15);
        }

        /* Alerts */
        .alert {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 10px;
            color: white;
            font-weight: bold;
        }
        .alert-success {
            background-color: #28a745;
        }
        .alert-error {
            background-color: #dc3545;
        }

        /* Footer */
        .footer {
            background: linear-gradient(to right, #1E3A8A, #6B7280);
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body class="flex flex-col min-h-screen">

    <div class="flex flex-grow">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li class="mb-3">
                    <a href="{{ url('/doctor/dashboard') }}" class="bg-blue-800 hover:bg-blue-700">Dashboard</a>
                </li>
                @if (App\Models\Doctor::where('user_id',Auth::id())->count()==0)
                <li class="mb-3">
                    <a href="{{ route('doctor.create')}}" class="bg-green-600 hover:bg-green-500">Create Profile</a>
                </li>
                @else
                <li class="mb-3">
                    <a href="{{ route('doctor.index') }}" class="bg-yellow-500 hover:bg-yellow-400">View Profile</a>
                </li>
                @endif
                <li class="mb-3">
                    <a href="{{ url('/doctor/logout') }}" class="bg-red-600 hover:bg-red-500">Logout</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 main-content">
            <!-- Navbar -->
            <div class="navbar shadow-md">
                <h1 class="text-xl font-semibold">Welcome, Dr. {{ Auth::user()->name ?? 'Doctor' }}</h1>
                <div class="relative group">
                    <button class="bg-white text-blue-700 px-4 py-2 rounded-lg shadow-md hover:bg-gray-200 transition">My Profile</button>
                    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-md opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <ul>
                            @if (App\Models\Doctor::where('user_id',Auth::id())->count()==0)
                            <li><a href="{{ route('doctor.create')}}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Create Profile</a></li>
                            @else
                            <li><a href="{{ route('doctor.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">View Profile</a></li>
                            <li><a href="{{ route('doctor.edit',Auth::id())}}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Edit Profile</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="page-content">
                @yield('content')
            </div>

            <!-- Alerts -->
            <div id="alert-container" class="fixed bottom-5 right-5 max-w-sm">
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div id="error-alert" class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <script>
                // Automatically remove alerts after 3 seconds
                setTimeout(function () {
                    document.getElementById('success-alert')?.remove();
                    document.getElementById('error-alert')?.remove();
                }, 3000);
            </script>
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

