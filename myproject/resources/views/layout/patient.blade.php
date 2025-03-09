<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 270px;
            background: linear-gradient(135deg, #1E3A8A, #4F46E5, #6B7280);
            color: white;
            min-height: 100vh;
            padding: 20px;
            box-shadow: 6px 6px 20px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            margin: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: all 0.3s ease;
        }

        .sidebar:hover {
            transform: scale(1.02);
            box-shadow: 8px 8px 25px rgba(0, 0, 0, 0.4);
        }

        .sidebar h2 {
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar ul {
            width: 100%;
            padding: 0;
        }

        .sidebar a {
            display: block;
            padding: 14px 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 16px;
            text-align: center;
            margin: 8px 0;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-weight: bold;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.6);
            color: #1E3A8A;
            transform: scale(1.05);
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(90deg, #4F46E5, #6B7280);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            margin: 15px;
        }

        .navbar button {
            background-color: white;
            color: #1E3A8A;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .navbar button:hover {
            background-color: #f3f4f6;
            transform: scale(1.05);
        }

        /* Footer Styling */
        .footer {
            background: #1E3A8A;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0px -3px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    <div class="navbar">
        <h1 class="text-xl font-semibold">Welcome, {{ Auth::user()->name ?? 'Patient' }}</h1>
        <button>My Profile</button>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Patient Panel</h2>
        <ul>
            <li><a href="{{ url('/patient/dashboard') }}">Dashboard</a></li>
            <li><a href="{{route('patient.doctor.index') }}">Doctors</a></li>
            <li><a href="{{ route('patient.appointment.list',Auth::user()->id) }}">Appointments</a></li>
            <li><a href="{{ route('patient.index') }}">Profile</a></li>
            <li><a href="{{ url('/logout') }}" class="bg-red-600 hover:bg-red-500">Logout</a></li>
        </ul>
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

