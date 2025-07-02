@extends('layouts.app')

@section('title', 'Racik Obat')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b pb-2">Racik Obat</h2>

        {{-- Alerts --}}
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

        {{-- Form Racikan --}}
        <form action="{{ route('racik.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @csrf
            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

            {{-- Pilih Jenis Racik --}}
            <div>
                <label for="jenis_racik" class="block text-sm font-medium text-gray-700 mb-1">Jenis Racik</label>
                <select name="jenis_racik" id="jenis_racik" class="w-full px-3 py-2 border rounded-md" required>
                    <option value="" disabled selected>Pilih jenis racik</option>
                    <option value="racikan">Racikan</option>
                    <option value="non-racikan">Non Racikan</option>
                </select>
            </div>


            {{-- Nama Racikan --}}
            <div>
                <label for="nama_racikan" class="block text-sm font-medium text-gray-700 mb-1">Nama Racikan</label>
                <input type="text" name="nama_racikan" id="nama_racikan" class="w-full px-3 py-2 border rounded-md"
                    value="{{ old('nama_racikan') }}" disabled />
            </div>

            {{-- Nama Pasien --}}
            <div>
                <label for="id_pasien" class="block text-sm font-medium text-gray-700 mb-1">Nama Pasien</label>
                <select name="id_pasien" id="id_pasien" class="w-full px-3 py-2 border rounded-md" required>
                    <option value="" disabled selected>Pilih pasien</option>
                    @foreach ($pasien as $item)
                        <option value="{{ $item->id }}" @selected(old('id_pasien') == $item->id)>{{ $item->nama_pasien }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Dynamic List Obat untuk Racikan --}}
            <div id="obat-container">
                <label class="block text-sm font-medium text-gray-700 mb-2">Detail Obat</label>

                <div class="obat-item grid grid-cols-3 gap-4 mb-2 items-center">
                    <select name="obat_details[0][id_obat]" class="border rounded-md px-2 py-1" required>
                        <option value="" disabled selected>Pilih obat</option>
                        @foreach ($obat as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                        @endforeach
                    </select>

                    <select name="obat_details[0][id_signa]" class="border rounded-md px-2 py-1" required>
                        <option value="" disabled selected>Pilih signa</option>
                        @foreach ($signa as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_signa }}</option>
                        @endforeach
                    </select>

                    <div class="flex gap-2">
                        <input type="number" name="obat_details[0][jumlah]" class="border rounded-md px-2 py-1 w-24"
                            placeholder="Jumlah" required>
                        <button type="button" class="text-red-500 hover:text-red-700 font-semibold"
                            onclick="hapusObat(this)">Hapus</button>
                    </div>
                </div>
            </div>

            <button type="button" onclick="tambahObat()" id="btnTambahObat"
                class="text-sm text-blue-600 hover:underline mt-2">
                + Tambah Obat
            </button>

            {{-- Catatan --}}
            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <textarea name="catatan" id="catatan" rows="3" class="w-full px-3 py-2 border rounded-md"
                    placeholder="Tulis catatan jika ada...">{{ old('catatan') }}</textarea>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors">
                Simpan Racikan
            </button>
        </form>

        {{-- Tabel Racikan --}}
        {{-- Daftar Racik --}}
        <div class="mt-12">
            <h3 class="text-2xl font-semibold mb-4 text-gray-800 border-b pb-2">Riwayat Racikan</h3>

            <table class="min-w-full border border-gray-300 rounded-md overflow-hidden bg-white shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">Id</th>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">Jenis Racikan</th>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">Nama Pasien</th>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">Nama User</th>
                        <th class="px-5 py-3 border-b text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($racik as $item)
                        <tr>
                            <td class="px-6 py-4">{{ $item->id }}</td>
                            <td class="px-6 py-4">{{ $item->jenis_racikan }}</td>
                            <td class="px-6 py-4">{{ $item->pasien->nama_pasien }}</td>
                            <td class="px-6 py-4">{{ $item->user->name }}</td>
                            <td class="px-6 py-4 flex items-center gap-4">
                                {{-- Tombol View --}}
                                <a href="{{ route('racik.show', $item->id) }}" class="text-green-600 hover:text-green-800"
                                    title="Lihat Data">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                {{-- Tombol Delete --}}
                                <form action="{{ route('racik.destroy', $item->id) }}" method="POST"
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
                                Belum ada data racikan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="mt-6">
                {{ $racik->links() }}
            </div>
        </div>
    </div>

    {{-- JavaScript Dinamis --}}
    <script>
        let index = 1;

        const jenisRacikSelect = document.getElementById('jenis_racik');
        const namaRacikanInput = document.getElementById('nama_racikan');
        const obatContainer = document.getElementById('obat-container');
        const btnTambahObat = document.getElementById('btnTambahObat');

        function setFormByJenisRacik() {
            const jenis = jenisRacikSelect.value;

            if (jenis === 'non-racik') {
                // disable nama racikan
                namaRacikanInput.value = '';
                namaRacikanInput.disabled = true;

                // hanya tampilkan 1 obat, hapus tambahan jika ada
                const obatItems = obatContainer.querySelectorAll('.obat-item');
                obatItems.forEach((item, i) => {
                    if (i > 0) item.remove();
                });

                // tombol tambah obat disembunyikan
                btnTambahObat.style.display = 'none';

                // sembunyikan tombol hapus pada obat pertama
                const hapusBtn = obatContainer.querySelector('.obat-item button');
                if (hapusBtn) hapusBtn.style.display = 'none';

            } else if (jenis === 'racikan') {
                // enable nama racikan
                namaRacikanInput.disabled = false;

                // tombol tambah obat muncul
                btnTambahObat.style.display = 'inline-block';

                // tombol hapus muncul di semua obat
                const obatItems = obatContainer.querySelectorAll('.obat-item');
                obatItems.forEach((item) => {
                    const hapusBtn = item.querySelector('button');
                    if (hapusBtn) hapusBtn.style.display = 'inline-block';
                });

            } else {
                // default saat belum pilih jenis racik
                namaRacikanInput.disabled = true;
                btnTambahObat.style.display = 'none';

                const hapusBtn = obatContainer.querySelector('.obat-item button');
                if (hapusBtn) hapusBtn.style.display = 'none';
            }
        }

        jenisRacikSelect.addEventListener('change', setFormByJenisRacik);

        // Inisialisasi saat load halaman
        document.addEventListener('DOMContentLoaded', () => {
            setFormByJenisRacik();
        });

        function tambahObat() {
            const div = document.createElement('div');
            div.className = "obat-item grid grid-cols-3 gap-4 mb-2 items-center";
            div.innerHTML = `
                <select name="obat_details[${index}][id_obat]" class="border rounded-md px-2 py-1" required>
                    <option value="" disabled selected>Pilih obat</option>
                    @foreach ($obat as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                    @endforeach
                </select>

                <select name="obat_details[${index}][id_signa]" class="border rounded-md px-2 py-1" required>
                    <option value="" disabled selected>Pilih signa</option>
                    @foreach ($signa as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_signa }}</option>
                    @endforeach
                </select>

                <div class="flex gap-2">
                    <input type="number" name="obat_details[${index}][jumlah]" class="border rounded-md px-2 py-1 w-24" placeholder="Jumlah" required>
                    <button type="button" class="text-red-500 hover:text-red-700 font-semibold" onclick="hapusObat(this)">Hapus</button>
                </div>
            `;
            obatContainer.appendChild(div);
            index++;
        }

        function hapusObat(button) {
            const row = button.closest('.obat-item');
            if (row) row.remove();
        }
    </script>
@endsection
