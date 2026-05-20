<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();

        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'nama_kaprodi' => 'required',
            'alias_prodi' => 'required'
        ]);

        Prodi::create([
            'nama_prodi' => $request->nama_prodi,
            'nama_kaprodi' => $request->nama_kaprodi,
            'alias_prodi' => $request->alias_prodi
        ]);

        return redirect('/prodi')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);

        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'nama_kaprodi' => 'required',
            'alias_prodi' => 'required'
        ]);

        $prodi = Prodi::findOrFail($id);

        $prodi->update([
            'nama_prodi' => $request->nama_prodi,
            'nama_kaprodi' => $request->nama_kaprodi,
            'alias_prodi' => $request->alias_prodi
        ]);

        return redirect('/prodi')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);

        $prodi->delete();

        return redirect('/prodi')
            ->with('success', 'Data berhasil dihapus');
    }
}