<?php

namespace App\Models;

use App\Observers\JobPostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([JobPostObserver::class])]
class JobPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'location',
        'min_salary',
        'max_salary',
        'mode',
        'type',
        'period',
        'company_id'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'job_post_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'job_applications')
            ->withPivot('status')
            ->withTimestamps();
    }
}
