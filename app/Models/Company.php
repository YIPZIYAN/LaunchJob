<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'name',
        'address',
        'description',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class, 'company_id');
    }

}
