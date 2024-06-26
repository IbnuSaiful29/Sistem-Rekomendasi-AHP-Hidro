<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $guarded = [''];

    public function pairwiseAlternatives()
    {
        return $this->hasMany(PairwiseAlternative::class, 'alternative_id');
    }

    public function historiPenangananAlternatif()
    {
        return $this->hasMany(HistoriPenangananAlternatif::class, 'id_alternatif');
    }
}
