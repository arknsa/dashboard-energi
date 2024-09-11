<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body style="background-color: #216288;" class="flex flex-col items-center justify-center min-h-screen space-y-6">

    <!-- Judul Dashboard -->
    <h1 class="text-center  text-white text-3xl font-bold">Dashboard Energi Kelompok 10</h1>
    
    <!-- Form Login -->
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-center text-3xl font-bold mb-6">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" required autofocus>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" style="background-color: #1c2d55;" class=" text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Pop-up Modal -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg w-96">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('simbol-x.png') }}" alt="Error icon" class="w-12 h-12">
            </div>
            <div class="text-center text-lg font-semibold mb-4">
                Oops... Sorry, Incorrect input
            </div>
            <div class="text-center">
                <button onclick="closePopup()" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">OK</button>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div>

    <script>
        function showPopup(message) {
            document.getElementById('popup').style.display = 'flex';
            document.getElementById('overlay').style.display = 'block';
            document.querySelector('.popup-body').textContent = message;
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        // Show pop-up if there's an error message
        @if (session('error_message'))
            showPopup("{{ session('error_message') }}");
        @endif
    </script>

</body>
</html>
