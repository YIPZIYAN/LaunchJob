<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class, 'job_type_id');
    }

    public function interestJobType(): HasMany
    {
        return $this->hasMany(InterestJobType::class, 'job_type_id');
    }

    public function employee(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class,'interest_job_type')
            ->withTimestamps();
    }
}
