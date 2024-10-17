<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilais = nilai::all();
        return view('nilai.index', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'nis' => 'required|max:8',
            'jurusan' => 'required',
            'nilai' => 'required|numeric',
        ], [
            'name.required' => 'Nama Siswa harus diisi!',
            'nis.required' => 'Nis harus diisi!',
            'jurusan.required' => 'Jurusan harus diisi!',
            'nilai.required' => 'Kelas harus diisi!',
            'name.max' => 'Nama obat maksimal 100 karakter!',
            'nis.max' => 'Nis maksimal 8 karakter!',
            'nilai.numeric' => 'Nilai harus angka!',
        ]);

        nilai::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'nilai' => $request->nilai
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Siswa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nilai $nilai)
    {
        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nilai $nilai)
    {
        $request->validate([
            'name' => 'required|max:100',
            'nis' => 'required|max:8',
            'jurusan' => 'required',
            'nilai' => 'required|numeric',
        ]);

        $nilai->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('nilai.home')->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nilai $nilai)
    {
        $nilai->delete();
        return redirect()->back()->with('deleted', 'Berhasil Menghapus Data!');
    }
}
