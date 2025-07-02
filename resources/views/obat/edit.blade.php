@extends('layouts.app')

@section('title', 'Edit Obat')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b pb-2">Edit Obat</h2>

        <form action="{{ route('obat.update', $obat->id) }}" method="POST"
            class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div>
                <label for="kode_obat" class="block text-sm font-medium text-gray-700 mb-1">Kode Obat</label>
                <input type="text" name="kode_obat" id="kode_obat" value="{{ old('kode_obat', $obat->kode_obat) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                <label for="nama_obat" class="block text-sm font-medium text-gray-700 mb-1">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                <label for="harga_obat" class="block text-sm font-medium text-gray-700 mb-1">Harga Obat</label>
                <input type="number" name="harga_obat" id="harga_obat" value="{{ old('harga_obat', $obat->harga_obat) }}"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                <label for="stok_obat" class="block text-sm font-medium text-gray-700 mb-1">Stok Obat</label>
                <input type="number" name="stok_obat" id="stok_obat" value="{{ old('stok_obat', $obat->stok_obat) }}"
                    required
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
