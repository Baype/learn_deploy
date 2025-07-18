@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b pb-2">Edit Pasien</h2>
        {{-- Alert Success or Failed --}}
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
    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_pasien" class="block text-sm font-medium text-gray-700 mb-1">Nama Pasien</label>
            <input type="text" name="nama_pasien" id="nama_pasien" value="{{ old('nama_pasien', $pasien->nama_pasien) }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors font-semibold">
            Update
        </button>
    </form>
</div>
@endsection
