<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriCekRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'histori_penanganan';
    protected $guarded = [''];

    public function village()
    {
        return $this->belongsTo(Village::class, 'id_desa');
    }

      // Definisikan relasi ke model HistoriPenangananCriteria
      public function criteria()
      {
          return $this->hasMany(HistoriPenangananCriteria::class, 'id_hasil_penanganan');
      }

      // Definisikan relasi ke model HistoriPenangananAlternatif
      public function alternatif()
      {
          return $this->hasMany(HistoriPenangananAlternatif::class, 'id_hasil_penanganan');
      }

}
