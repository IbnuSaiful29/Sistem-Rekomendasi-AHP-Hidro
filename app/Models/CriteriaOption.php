<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaOption extends Model
{
    use HasFactory;

    protected $table = 'criteria_option';
    protected $guarded = [''];
}
