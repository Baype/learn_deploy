<?php

namespace App\Http\Controllers;

use App\Models\Signa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SignaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Signa::query();

        if ($request->filled('search')) {
            $query->where('kode_signa', 'like', '%' . $request->search . '%');
        }

        $signa = $query->paginate(10)->withQueryString();

        return view('signa.index', compact('signa'));
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
            'kode_signa' => 'required|string',
            'nama_signa' => 'required|string|max:256',
        ]);

        Signa::create($request->all());

        return redirect()->route('signa.index')->with('success-daftar', 'Signa berhasil didaftarkan!');
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
        $signa = Signa::findOrFail($id);

        return view('signa.edit', compact('signa'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_signa' => 'required|string',
            'nama_signa' => 'required|string|max:256',
        ]);
        $signa = Signa::findOrFail($id);
        $signa->update($request->all());


        return redirect()->route('signa.index')->with('success-daftar', 'Signa berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $signa = Signa::findOrFail($id);
        $signa->delete();

        return redirect()->route('signa.index')->with('success-daftar','Signa berhasil dihapus!');
    }
}
