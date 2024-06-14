<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PairwiseAlternative extends Model
{
    use HasFactory;
    protected $table = 'pairwise_alternative';
    protected $guarded = [''];

    public function alternative()
    {
        return $this->belongsTo(Alternatif::class, 'alternative_id');
    }

    // Relasi ke model Criteria
    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id');
    }
}
