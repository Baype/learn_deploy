<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Verifikasi Email</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-4 text-center text-gray-800">Verifikasi Email Anda</h1>

        <p class="mb-6 text-center text-gray-700">
            Kami telah mengirim link verifikasi ke email Anda.<br>
            Jika belum menerima, klik tombol di bawah untuk mengirim ulang.
        </p>

        @if (session('message'))
            <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-md font-semibold hover:bg-blue-700 transition-colors">
                Kirim Ulang Email Verifikasi
            </button>
        </form>
    </div>
</body>

</html>
