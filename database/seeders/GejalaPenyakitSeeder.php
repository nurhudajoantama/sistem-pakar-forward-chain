<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaPenyakitSeeder extends Seeder
{
    public function dataPenyakit()
    {
        return [
            [
                'kode_penyakit' => 'P1',
                'nama_penyakit' => 'Metabolic Bone Disease (MBD)',
            ],
            [
                'kode_penyakit' => 'P2',
                'nama_penyakit' => 'Parasit Internal',
            ]
        ];
    }

    public function dataGejala()
    {
        return  [
            [
                'kode_gejala' => 'G1',
                'nama_gejala' => 'Lemahnya tulang, deformitas tulang (MBD)',
                'kode_penyakit' => ['P1']
            ]
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyakit = $this->dataPenyakit();
        $gejala = $this->dataGejala();

        foreach ($penyakit as $p) {
            \App\Models\Penyakit::create($p);
        }

        foreach ($gejala as $g) {
            $penyakit = $g['kode_penyakit'];
            unset($g['kode_penyakit']);
            $gejala = \App\Models\Gejala::create($g);
            $gejala->penyakit()->attach($penyakit);
        }
    }
}
