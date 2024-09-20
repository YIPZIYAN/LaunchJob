<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'about',
        'resume',
        'profession'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function interestJobType(): HasMany
    {
        return $this->hasMany(InterestJobType::class, 'employee_id');
    }

    public function jobType(): BelongsToMany
    {
        return $this->belongsToMany(JobType::class,'interest_job_types')
            ->withTimestamps();
    }
}
