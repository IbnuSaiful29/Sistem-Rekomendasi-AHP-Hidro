<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriPenangananCriteria extends Model
{
    protected $table = 'histori_penanganan_criteria';
    protected $guarded = [''];

    public function Criteria()
    {
        return $this->belongsTo(Criteria::class, 'id_criteria');
    }

    public function historiCekRekomendasi()
    {
        return $this->belongsTo(HistoriCekRekomendasi::class, 'id_hasil_penanganan');
    }

}
