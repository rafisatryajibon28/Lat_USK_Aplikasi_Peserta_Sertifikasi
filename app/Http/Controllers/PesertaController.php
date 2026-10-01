<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $query = Peserta::with('skema')->orderBy('id', 'asc');

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('nik', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('no_hp', 'like', "%$search%")
              ->orWhere('alamat', 'like', "%$search%");
        });
    }

    $pesertas = $query->get();

    return view('peserta.index', compact('pesertas', 'search'));
}

    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|max:100',
            'nik'      => 'required|unique:pesertas|max:20',
            'email'    => 'nullable|email',
            'no_hp'    => 'nullable|max:15',
            'alamat'   => 'nullable',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        Peserta::create($request->only(['nama', 'nik', 'email', 'no_hp', 'alamat', 'skema_id']));

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan');
    }

    public function show($id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas  = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'nama'     => 'required|max:100',
            'nik'      => 'required|max:20|unique:pesertas,nik,' . $id,
            'email'    => 'nullable|email',
            'no_hp'    => 'nullable|max:15',
            'alamat'   => 'nullable',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        $peserta->update($request->only(['nama', 'nik', 'email', 'no_hp', 'alamat', 'skema_id']));

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diubah');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus');
    }
}