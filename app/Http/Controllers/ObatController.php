<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Obat::query();

        if ($request->filled('search')) {
            $query->where('nama_obat', 'like', '%' . $request->search . '%');
        }

        $obat = $query->paginate(10)->withQueryString(); // <--- penting

        return view('obat.index', compact('obat'));
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
            'kode_obat' => 'required|string|max:50',
            'nama_obat' => 'required|string|max:50',
            'harga_obat' => 'required',
            'stok_obat' => 'required',
        ]);
        Obat::create($request->all());
        return redirect()->route('obat.index')->with('success-daftar', 'Obat berhasil didaftarkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_obat' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'harga_obat' => 'required|integer',
            'stok_obat' => 'required|integer',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Data pasien berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
