<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::orderBy('id', 'asc')->get();
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas|max:20',
            'nama_skema' => 'required|max:100',
            'deskripsi'  => 'nullable',
        ]);

        Skema::create($request->only(['kode_skema', 'nama_skema', 'deskripsi']));

        return redirect()->route('skema.index')->with('success', 'Data skema berhasil ditambahkan');
    }

    public function show($id)
    {
        $skema = Skema::findOrFail($id);
        return view('skema.show', compact('skema'));
    }

    public function edit($id)
    {
        $skema = Skema::findOrFail($id);
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, $id)
    {
        $skema = Skema::findOrFail($id);

        $request->validate([
            'kode_skema' => 'required|max:20|unique:skemas,kode_skema,' . $id,
            'nama_skema' => 'required|max:100',
            'deskripsi'  => 'nullable',
        ]);

        $skema->update($request->only(['kode_skema', 'nama_skema', 'deskripsi']));

        return redirect()->route('skema.index')->with('success', 'Data skema berhasil diubah');
    }

    public function destroy($id)
    {
        $skema = Skema::findOrFail($id);
        $skema->delete();

        return redirect()->route('skema.index')->with('success', 'Data skema berhasil dihapus');
    }
}