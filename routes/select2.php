<?php

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/select2')->name('select2.')->group(function () {
    Route::get('gejala', fn (Request $request) =>   response()->json([
        'results' => Gejala::select(['kode_gejala', 'nama_gejala as text'])
            ->oldest('kode_gejala')
            ->when($request->input('term'), fn ($query, $term) => $query->where('nama_gejala', 'like', "%$term%"))
            ->get(),
    ]))->name('gejala');
    
    Route::get('penyakit', fn (Request $request) =>   response()->json([
        'results' => Penyakit::select(['kode_penyakit', 'nama_penyakit as text'])
            ->oldest('kode_penyakit')
            ->when($request->input('term'), fn ($query, $term) => $query->where('nama_penyakit', 'like', "%$term%"))
            ->get(),
    ]))->name('penyakit');
});
