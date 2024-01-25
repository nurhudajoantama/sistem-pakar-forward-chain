<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';

    protected $primaryKey = 'kode_gejala';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_gejala',
        'nama_gejala',
    ];

    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class, 'gejala_penyakit', 'kode_gejala', 'kode_penyakit');
    }
}
