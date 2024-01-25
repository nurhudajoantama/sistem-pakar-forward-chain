<?php

namespace App\Http\Controllers;

use App\DataTables\PenyakitDataTable;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenyakitDataTable $dataTable)
    {
        return $dataTable->render('penyakit.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Penyakit $penyakit)
    {
        return view('penyakit.form', compact('penyakit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_penyakit' => ['required', 'string', 'max:255', Rule::unique(Penyakit::class, 'kode_penyakit')],
            'nama_penyakit' => ['required', 'string', 'max:255'],
        ]);

        Penyakit::create($data);

        return to_route('penyakit.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyakit $penyakit)
    {
        return view('penyakit.form', compact('penyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyakit $penyakit)
    {
        $data = $request->validate([
            'kode_penyakit' => ['required', 'string', 'max:255', Rule::unique(Penyakit::class, 'kode_penyakit')->ignore($penyakit->kode_penyakit, 'kode_penyakit')],
            'nama_penyakit' => ['required', 'string', 'max:255'],
        ]);

        $penyakit->update($data);

        return to_route('penyakit.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();

        return to_route('penyakit.index')->with('success', 'Data berhasil dihapus');
    }
}
