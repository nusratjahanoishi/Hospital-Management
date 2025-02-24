
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
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
        <script>
            // Automatically remove success and error messages after 3 seconds
            setTimeout(function () {
                document.getElementById('success-alert')?.remove();
                document.getElementById('error-alert')?.remove();
            }, 2000); // Change from 500ms to 3000ms (3 seconds)
        </script>
    </div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Patient Register</h2>
    
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Name</label>
                    <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Email</label>
                    <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email" required>
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Password</label>
                    <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your password" required>
                </div>
    
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition duration-300">
                    Login
                </button>
            </form>
    
            <p class="text-gray-600 text-sm text-center mt-4">
                Don't have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
            </p>
        </div>
    </div>
</body>
</html>

