<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view ('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'nama_dekan' => 'required',
         
        ]);

        Fakultas::create([
            'nama_fakultas' => $request->nama_fakultas,
            'nama_dekan' => $request->nama_dekan,
        ]);
        
        return redirect('/fakultas')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Fakultas $fakulta)
    {
        return view('fakultas.edit', [
            'fakultas' => $fakulta
        ]);
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'nama_dekan' => 'required'
        ]);

        $fakultas->update([
            'nama_fakultas' => $request->nama_fakultas,
            'nama_dekan' => $request->nama_dekan
        ]);

        return redirect('/fakultas')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();

        return redirect('/fakultas')->with('success', 'Data berhasil dihapus');
    }
}