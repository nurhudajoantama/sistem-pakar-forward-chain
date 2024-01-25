<?php

use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/select2')->name('select2.')->group(function () {
    Route::get('gejala', fn (Request $request) =>   response()->json([
        'results' => Gejala::select(['kode_gejala', 'nama_gejala as text'])
            ->oldest('kode_gejala')
            ->when($request->input('term'), fn ($query, $term) => $query->where('nama_gejala', 'like', "%$term%"))
            ->get(),
    ]))->name('gejala');
});
