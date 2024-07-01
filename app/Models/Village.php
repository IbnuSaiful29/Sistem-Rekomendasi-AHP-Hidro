<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $table = 'village';
    protected $guarded = [''];

    public function historiCekRekomendasi()
    {
        return $this->hasMany(HistoriCekRekomendasi::class, 'id_desa');
    }
}
