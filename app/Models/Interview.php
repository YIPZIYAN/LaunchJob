<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_time',
        'description',
        'end_time',
        'link',
        'mode',
        'location',
    ];
}
