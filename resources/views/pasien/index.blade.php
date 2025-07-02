@extends('layouts.app')

@section('title', 'Pasien Master')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">

        {{-- Form Tambah Pasien --}}
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b pb-2">Tambah Pasien</h2>
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
        <form action="{{ route('pasien.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div>
                <label for="nama_pasien" class="block text-sm font-medium text-gray-700 mb-1">Nama Pasien</label>
                <input type="text" name="nama_pasien" id="nama_pasien" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: John Doe" />
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors font-semibold">
                Simpan
            </button>
        </form>

        {{-- Daftar Pasien --}}
        <div class="mt-12">

            <h3 class="text-2xl font-semibold mb-4 text-gray-800 border-b pb-2">Daftar Pasien</h3>
            <form method="GET" action="{{ route('pasien.index') }}" class="mb-6 mt-6 flex items-center gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pasien..."
                    class="w-full max-w-xs px-4 py-2 border border-gray-300 rounded-md shadow-sm
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md
               hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                    Cari
                </button>
            </form>
            <table class="min-w-full border border-gray-300 rounded-md overflow-hidden bg-white shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">Nama Pasien</th>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasien as $item)
                        <tr>
                            <td class="px-6 py-4">{{ $item->id }}</td>
                            <td class="px-6 py-4">{{ $item->nama_pasien }}</td>
                            <td class="px-6 py-4 flex items-center gap-4">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('pasien.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800"
                                    title="Edit Data">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M16.5 3.5l4 4L13 15l-4 1 1-4 7.5-7.5z" />
                                    </svg>
                                </a>

                                {{-- Tombol Delete --}}
                                <form action="{{ route('pasien.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v1H9V4a1 1 0 011-1z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-8 text-center text-gray-500 italic">
                                Belum ada data pasien.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $pasien->links() }}
            </div>
        </div>
    </div>
@endsection
