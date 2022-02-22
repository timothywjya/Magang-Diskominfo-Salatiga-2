<?php

namespace App\Http\Controllers;
use App\Models\Jenis;

use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        // $jenis = Menu::select('kode', 'kode_berkas', 'nama')->get();
        return view('jenis.tampil', ['jenis' => $jenis]);
    }

    public function create()
    {
        return view('jenis.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'kode_berkas' => 'required',
            'nama' => 'required',
        ]);
        $array = $request->only([
            'kode', 'kode_berkas', 'nama', 'keterangan'
        ]);
        $user = Jenis::create($array);
        return redirect()->route('jenis.index')
            ->with('success_message', 'Berhasil menambah Produk Baru');
    }

    public function edit($id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) return redirect()->route('jenis.index')
            ->with('error_message', 'User dengan id '.$id.' tidak ditemukan');
        return view('jenis.edit', [
            'jenis' => $jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenis = Jenis::find($id);
        $jenis->kode = $request->kode;
        $jenis->kode_berkas = $request->kode_berkas;
        $jenis->nama = $request->nama;
        $jenis->keterangan = $request->keterangan;
        $jenis->save();
    
    return redirect()->route('jenis.index')
        ->with('success_message', 'Berhasil mengubah Peraturan');
    }

    public function show($id)
    {
        $jenis = Jenis::findOrFail($id);
        if (!$jenis) return redirect()->route('jenis.index')
        ->with('error_message', 'Jenis dengan id'.$id.' tidak ditemukan');

        return view('jenis.info', compact('jenis'));
    }

    public function destroy(Request $request, $id)
    {
        $jenis = Jenis::find($id);
        if ($jenis) $jenis->delete();
    
        return redirect()->route('jenis.index')
            ->with('success_message', 'Berhasil menghapus Peraturan');
    }
}