<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
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
            'class' => 'required',
        ], [
            'name.required' => 'Nama Siswa harus diisi!',
            'nis.required' => 'Nis harus diisi!',
            'jurusan.required' => 'Jurusan harus diisi!',
            'class.required' => 'Kelas harus diisi!',
            'name.max' => 'Nama obat maksimal 100 karakter!',
            'nis.max' => 'Nis maksimal 8 karakter!',
        ]);

        Siswa::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'class' => $request->class
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Siswa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'name' => 'required|max:100',
            'nis' => 'required|max:8',
            'jurusan' => 'required',
            'class' => 'required',
        ]);

        $siswa->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'class' => $request->class,
        ]);

        return redirect()->route('siswa.home')->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->back()->with('deleted', 'Berhasil Menghapus Data!');

    }
}
