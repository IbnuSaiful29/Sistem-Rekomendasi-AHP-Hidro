<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriPenangananAlternatif extends Model
{
    use HasFactory;

    protected $table = 'histori_penanganan_alternatif';
    protected $guarded = [''];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternative');
    }

    public function historiCekRekomendasi()
    {
        return $this->belongsTo(HistoriCekRekomendasi::class, 'id_hasil_penanganan');
    }
}
