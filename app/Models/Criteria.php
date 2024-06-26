<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $guarded = [''];

    public function historiPenangananCriteria()
    {
        return $this->hasMany(HistoriPenangananCriteria::class, 'id_criteria');
    }
}
