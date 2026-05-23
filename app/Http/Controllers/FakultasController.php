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
       
        return view ('fakultas.create', compact('listFakultas'));
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

    public function edit($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view('fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'nama_dekan' => 'required'
        ]);

        $fakultas = Fakultas::findOrFail($id);

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