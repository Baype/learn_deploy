@extends('layouts.app')

@section('title', 'Detail Racikan')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <h2 class="text-3xl font-semibold mb-6">Detail Racikan:</h2>

        <p><strong>Jenis Racikan:</strong> {{ $racikan->jenis_racikan }}</p>
        <p><strong>Nama Racikan:</strong> {{ $racikan->racikan_details->first()->nama_racikan ?? '-' }}</p>
        <p><strong>Pasien:</strong> {{ $racikan->pasien->nama_pasien }}</p>
        <p><strong>User:</strong> {{ $racikan->user->name }}</p>
        <p><strong>Catatan:</strong> {{ $racikan->racikan_details->first()->catatan ?? '-' }}</p>

        <h3 class="mt-6 text-xl font-semibold">Daftar Obat:</h3>
        <table class="min-w-full border border-gray-300 rounded-md overflow-hidden bg-white shadow-sm mt-2">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">Nama Obat</th>
                    <th class="px-4 py-2 border-b">Signa</th>
                    <th class="px-4 py-2 border-b">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($racikan->racikan_details as $detail)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $detail->obat->nama_obat }}</td>
                        <td class="px-4 py-2 border-b">{{ $detail->signa->nama_signa }}</td>
                        <td class="px-4 py-2 border-b">{{ $detail->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('racik.print', $racikan->id) }}" target="_blank"
            class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Print PDF
        </a>


        <a href="{{ route('racik.index') }}"
            class="inline-block mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Kembali ke Daftar Racikan
        </a>
    </div>
@endsection
