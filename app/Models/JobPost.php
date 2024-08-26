<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'min_salary',
        'max_salary',
        'mode',
        'type',
        'period',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
