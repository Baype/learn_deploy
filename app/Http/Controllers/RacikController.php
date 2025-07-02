<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Racik;
use App\Models\RacikanDetail;
use App\Models\RiwayatObat;
use App\Models\Signa;
use App\Models\User;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class RacikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $racik = RiwayatObat::latest()->paginate(10);
        $pasien = Pasien::all();
        $obat = Obat::all();
        $signa = Signa::all();

        return view('racik.index', compact('racik', 'pasien', 'obat', 'signa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'jenis_racik' => 'required|in:racikan,non-racikan',
            'id_pasien' => 'required|exists:pasiens,id',
            'id_user' => 'required|exists:users,id',
            'nama_racikan' => 'nullable|string|max:255',
            'obat_details' => 'required|array|min:1',
            'obat_details.*.id_obat' => 'required|exists:obat_master,id',
            'obat_details.*.id_signa' => 'required|exists:signa_master,id',
            'obat_details.*.jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        if ($request->jenis_racik === 'racikan' && empty($request->nama_racikan)) {
            return back()->withErrors(['nama_racikan' => 'Nama racikan wajib diisi untuk jenis racikan.'])->withInput();
        }

        if ($request->jenis_racik === 'non-racikan' && count($request->obat_details) > 1) {
            return back()->withErrors(['obat_details' => 'Hanya boleh memasukkan satu obat untuk non-racikan.'])->withInput();
        }

        DB::beginTransaction();

        try {
            $riwayat = RiwayatObat::create([
                'id_pasien' => $request->id_pasien,
                'id_user' => $request->id_user,
                'jenis_racikan' => $request->jenis_racik, // ini 'racikan' atau 'non-racikan'
            ]);

            foreach ($request->obat_details as $detail) {
                $obat = Obat::findOrFail($detail['id_obat']);
                if ($obat->stok_obat < $detail['jumlah']) {
                    DB::rollBack();
                    return back()->withErrors([
                        'stok' => "Stok obat '{$obat->nama_obat}' tidak mencukupi."
                    ])->withInput();
                }

                RacikanDetail::create([
                    'riwayat_obat_id' => $riwayat->id,
                    'id_obat' => $detail['id_obat'],
                    'id_signa' => $detail['id_signa'],
                    'jumlah' => $detail['jumlah'],
                    // Kalau kolom ini tidak wajib, bisa dihapus
                    'nama_racikan' => $request->jenis_racik === 'racikan' ? $request->nama_racikan : null,
                    'catatan' => $request->catatan ?? '',
                ]);

                $obat->stok_obat -= $detail['jumlah'];
                $obat->save();
            }

            DB::commit();
            return redirect()->route('racik.index')->with('success-daftar', 'Racikan berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat menyimpan racikan: ' . $e->getMessage()
            ])->withInput();
        }
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $racikan = RiwayatObat::with(['pasien', 'user', 'racikan_details.obat', 'racikan_details.signa'])->findOrFail($id);

        return view('racik.show', compact('racikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $racik = RacikanDetail::findOrFail($id);
        $pasien = Pasien::all();  // ambil semua pasien untuk dropdown
        $obat = Obat::all();      // ambil semua obat untuk dropdown
        $signa = Signa::all();    // ambil semua signa untuk dropdown

        return view('racik.edit', compact('racik', 'pasien', 'obat', 'signa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_racikan' => 'required|string|max:255',
            // 'jenis_racikan' => 'required',
            'id_pasien' => 'required',
            'id_obat' => 'required',
            'id_signa' => 'required',
            'id_user' => 'required',
            'catatan' => 'required',
        ]);

        $racik = RacikanDetail::findOrFail($id);
        $racik->update($request->all());

        return redirect()->route('racik.index')->with('success-daftar', 'Data racikan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $riwayat = RiwayatObat::with('racikan_details')->findOrFail($id);

            // Kembalikan stok obat
            foreach ($riwayat->racikan_details as $detail) {
                $obat = Obat::find($detail->id_obat);
                if ($obat) {
                    $obat->stok_obat += $detail->jumlah;
                    $obat->save();
                }

                $detail->delete(); // Hapus racikan detail
            }

            $riwayat->delete(); // Hapus riwayat racikan utama

            DB::commit();

            return redirect()->route('racik.index')->with('success-daftar', 'Racikan berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat menghapus racikan: ' . $e->getMessage()
            ]);
        }
    }

    public function print($id)
    {
        $racikan = RiwayatObat::with(['pasien', 'user', 'racikan_details.obat', 'racikan_details.signa'])->findOrFail($id);

        $pdf = Pdf::loadView('racik.print', compact('racikan'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('racikan-' . $racikan->id . '.pdf');
    }

}
