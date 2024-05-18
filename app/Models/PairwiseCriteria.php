<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PairwiseCriteria extends Model
{
    use HasFactory;
    protected $table = 'pairwise_criteria';
    protected $guarded = [''];
}
