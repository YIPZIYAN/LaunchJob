<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'min_salary',
        'max_salary',
        'position',
        'job_type',
    ];
}
