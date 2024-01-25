<?php

namespace App\Http\Controllers;

use App\DataTables\GejalaDataTable;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GejalaDataTable $dataTable)
    {
        return $dataTable->render('gejala.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Gejala $gejala)
    {
        $gejala->load('penyakit');
        return view('gejala.form', compact('gejala'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string', 'max:255', Rule::unique(Gejala::class, 'kode_gejala')],
            'nama_gejala' => ['required', 'string', 'max:255'],
            'penyakit' => ['required', 'array'],
            'penyakit.*' => ['required', 'string', 'exists:penyakit,kode_penyakit'],
        ]);

        $gejala = Gejala::create($data);
        $gejala->penyakit()->sync($request->penyakit);

        return to_route('gejala.index')->with('success', 'Data berhasil disimpan');
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
    public function edit(Gejala $gejala)
    {
        $gejala->load('penyakit');
        return view('gejala.form', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string', 'max:255', Rule::unique(Gejala::class, 'kode_gejala')->ignore($gejala->kode_gejala, 'kode_gejala')],
            'nama_gejala' => ['required', 'string', 'max:255'],
            'penyakit' => ['required', 'array'],
            'penyakit.*' => ['required', 'string', 'exists:penyakit,kode_penyakit'],
        ]);

        $gejala->update($data);
        $gejala->penyakit()->sync($request->penyakit);

        return to_route('gejala.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return to_route('gejala.index')->with('success', 'Data berhasil dihapus');
    }
}
