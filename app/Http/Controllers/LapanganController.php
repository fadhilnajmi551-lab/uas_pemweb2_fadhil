<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::all();
        return view('lapangans.index', compact('lapangans'));
    }

    public function create()
    {
        return view('lapangans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'jenis_lapangan' => 'required',
            'harga_per_jam' => 'required|numeric',
            'status' => 'required',
        ]);

        Lapangan::create($request->all());

        return redirect()->route('lapangans.index')
            ->with('success', 'Data lapangan berhasil ditambahkan.');
    }
    public function edit(Lapangan $lapangan)
{
    return view('lapangans.edit', compact('lapangan'));
}

public function update(Request $request, Lapangan $lapangan)
{
    $request->validate([
        'nama_lapangan' => 'required',
        'jenis_lapangan' => 'required',
        'harga_per_jam' => 'required|numeric',
        'status' => 'required',
    ]);

    $lapangan->update($request->all());

    return redirect()->route('lapangans.index')
        ->with('success', 'Data lapangan berhasil diupdate.');
}

public function destroy(Lapangan $lapangan)
{
    $lapangan->delete();

    return redirect()->route('lapangans.index')
        ->with('success', 'Data lapangan berhasil dihapus.');
}
}