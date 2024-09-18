<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_time',
        'date',
        'description',
        'end_time',
        'link',
        'mode',
        'location',
    ];

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->format('g:i A');
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->format('g:i A');
    }

    public function jobApplication(): BelongsTo
    {
        return $this->belongsTo(JobApplication::class);
    }


}
