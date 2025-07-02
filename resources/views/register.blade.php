<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Register</h2>
        @if (session('success-daftar'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success-daftar') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-gray-700 font-medium">Full name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    aria-describedby="emailHelp" placeholder="John Due" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-gray-700 font-medium">Email address</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    aria-describedby="emailHelp" placeholder="you@example.com" required />
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your password" required />
            </div>

            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0">
                <label class="block mb-2 text-gray-700 font-medium">Already have access? </label>
                <a href="/"
                    class="text-blue-600 cursor-pointer hover:underline text-sm text-center sm:text-right">
                    Login here!
                </a>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-md font-semibold hover:bg-blue-700 transition-colors">
                Sign Up
            </button>
        </form>
    </div>
</body>

</html>
