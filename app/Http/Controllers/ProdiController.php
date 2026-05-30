<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();

        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        $listFakultas = Fakultas::all();
        return view('prodi.create', compact("listFakultas"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'nama_kaprodi' => 'required',
            'alias_prodi' => 'required',
            'fakultas_id' => 'required',
            'photo_kaprodi' => 'required'

        ]);
        Storage::disk("public")->put("prodi", $request->photo_kaprodi);

        Prodi::create([
            'nama_prodi' => $request->nama_prodi,
            'nama_kaprodi' => $request->nama_kaprodi,
            'alias_prodi' => $request->alias_prodi,
            'fakultas_id' => $request->fakultas_id,
            'photo_kaprodi' => $request->photo_kaprodi 
        ]);

        return redirect('/prodi')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Prodi $prodi)
    {
        $listFakultas = Fakultas::all();
        
        return view('prodi.edit', compact('prodi', 'listFakultas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fakultas_id' => 'required',
            'nama_prodi' => 'required',
            'nama_kaprodi' => 'required',
            'alias_prodi' => 'required',
            'photo_kaprodi' => 'required'
        ]);

        $prodi = Prodi::findOrFail($id);
         
        Storage::disk("public")->put("prodi", $request->photo_kaprodi);

        $prodi->update($validated);

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