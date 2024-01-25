<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaPenyakitSeeder extends Seeder
{
    public function dataGejala()
    {
        return  [
            [
                'kode_gejala' => 'G1',
                'nama_gejala' => 'Lemahnya tulang, deformitas tulang (MBD)',
            ],
            [
                'kode_gejala' => 'G2',
                'nama_gejala' => 'Kaki yang bengkok (MBD)',
            ],
            [
                'kode_gejala' => 'G3',
                'nama_gejala' => 'Kelemahan umum (MBD)',
            ],
            [
                'kode_gejala' => 'G4',
                'nama_gejala' => 'Diare (Parasit Internal)',
            ],
            [
                'kode_gejala' => 'G5',
                'nama_gejala' => 'Kehilangan berat badan (Parasit Internal)',
            ],
            [
                'kode_gejala' => 'G6',
                'nama_gejala' => 'Penurunan nafsu makan (Parasit Internal)',
            ],
            [
                'kode_gejala' => 'G7',
                'nama_gejala' => 'Menggaruk-garuk (Parasit Eksternal)',
            ],
            [
                'kode_gejala' => 'G8',
                'nama_gejala' => 'Kulit kemerahan (Parasit Eksternal)',
            ],
            [
                'kode_gejala' => 'G9',
                'nama_gejala' => 'Pernapasan cepat (Infeksi Respiratori)',
            ],
            [
                'kode_gejala' => 'G10',
                'nama_gejala' => 'Lendir hidung (Infeksi Respiratori)',
            ],
            [
                'kode_gejala' => 'G11',
                'nama_gejala' => 'Batuk (Infeksi Respiratori)',
            ],
            [
                'kode_gejala' => 'G12',
                'nama_gejala' => 'Bengkak pada mulut atau gusi (Stomatitis)',
            ],
            [
                'kode_gejala' => 'G13',
                'nama_gejala' => 'Merah pada mulut atau gusi (Stomatitis)',
            ],
            [
                'kode_gejala' => 'G14',
                'nama_gejala' => 'Luka pada mulut atau gusi (Stomatitis)',
            ],
            [
                'kode_gejala' => 'G15',
                'nama_gejala' => 'Kelebihan berat badan (Obesitas)',
            ],
            [
                'kode_gejala' => 'G16',
                'nama_gejala' => 'Kurang aktivitas fisik (Obesitas)',
            ],
            [
                'kode_gejala' =>'G17',
                'nama_gejala' => 'Perubahan warna (Stress)',
            ],
            [
                'kode_gejala' => 'G18',
                'nama_gejala' => 'Penolakan makan (Stress)',
            ],
            [
                'kode_gejala' => 'G19',
                'nama_gejala' => 'Perilaku cemas (Stress)',
            ],
            [
                'kode_gejala' => 'G20',
                'nama_gejala' => 'Kesulitan mengeluarkan telur (Egg Binding)',
            ],
            [
                'kode_gejala' => 'G21',
                'nama_gejala' => 'Perilaku gelisah (Egg Binding)',
            ],
        ];
    }

    public function dataPenyakit()
    {
        return [
            [
                'kode_penyakit' => 'P1',
                'nama_penyakit' => 'Metabolic Bone Disease (MBD)',
                'gejala' => ['G1', 'G2', 'G3']
            ],
            [
                'kode_penyakit' => 'P2',
                'nama_penyakit' => 'Parasit Internal',
                'gejala' => ['G4', 'G5', 'G6']
            ],
            [
                'kode_penyakit' => 'P3',
                'nama_penyakit' => 'Parasit Eksternal',
                'gejala' => ['G7', 'G8']
            ],
            [
                'kode_penyakit' => 'P4',
                'nama_penyakit' => 'Infeksi Respiratori',
                'gejala' => ['G9', 'G10', 'G11']
            ],
            [
                'kode_penyakit' => 'P5',
                'nama_penyakit' => 'Stomatitis (Radang Mulut)',
                'gejala' => ['G12', 'G13', 'G14']
            ],
            [
                'kode_penyakit' => 'P6',
                'nama_penyakit' => 'Obesitas',
                'gejala' => ['G15', 'G16']
            ],
            [
                'kode_penyakit' => 'P7',
                'nama_penyakit' => 'Stress',
                'gejala' => ['G17', 'G18', 'G19']
            ],
            [
                'kode_penyakit' => 'P8',
                'nama_penyakit' => 'Egg Binding',
                'gejala' => ['G20', 'G21']
            ],
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gejala = $this->dataGejala();
        $penyakit = $this->dataPenyakit();

        foreach ($gejala as $item) {
            \App\Models\Gejala::create($item);
        }

        foreach ($penyakit as $item) {
            if(isset($item['gejala'])) {
                $gejala = $item['gejala'];
                unset($item['gejala']);
            } else {
                $gejala = null;
            }
            $penyakit = \App\Models\Penyakit::create($item);
            if ($gejala) {
                $penyakit->gejala()->attach($gejala);
            }
        }
    }
}
