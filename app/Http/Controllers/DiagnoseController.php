<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    public function index()
    {
        return view('diagnose.index');
    }

    public function calculate(Request $request)
    {
        $data = $request->validate([
            'gejala' => ['required', 'array'],
            'gejala.*' => ['required', 'string', 'exists:gejala,kode_gejala'],
        ]);

        $gejala = Gejala::whereIn('kode_gejala', $data['gejala'])->with('penyakit')->get();

        $penyakit = [];
        foreach ($gejala as $g) {
            foreach ($g->penyakit as $p) {
                if (isset($penyakit[$p->kode_penyakit])) {
                    $penyakit[$p->kode_penyakit]['score'] += 1;
                } else {
                    $penyakit[$p->kode_penyakit] = [
                        'score' => 1,
                        'penyakit' => $p,
                    ];
                }
            }
        }

        $penyakit = collect($penyakit)->sortByDesc('score')->values()->all();

        return view('diagnose.result', compact('penyakit'));
    }
}
