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
        return view('gejala.form', compact('gejala'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string', 'max:255', Rule::unique('gejala', 'kode_gejala')],
            'nama_gejala' => ['required', 'string', 'max:255'],
        ]);

        Gejala::create($data);

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
        return view('gejala.form', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string', 'max:255', Rule::unique('gejala', 'kode_gejala')->ignore($gejala->kode_gejala, 'kode_gejala')],
            'nama_gejala' => ['required', 'string', 'max:255'],
        ]);

        $gejala->update($data);

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
