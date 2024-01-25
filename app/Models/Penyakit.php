<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';

    protected $primaryKey = 'kode_gejala';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
    ];

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'gejala_penyakit', 'kode_penyakit', 'kode_gejala');
    }
}
