<?php

namespace App\Factory;

use App\Models\User;

class ProfileFactory
{
    public static function create(User $user): ProfileInterface
    {

        if ($user->hasRole('company')) {
            return new CompanyProfile($user);
        }

        if ($user->hasRole('employee')) {
            return new EmployeeProfile($user);
        }

        throw new \Exception("Invalid user role: {$user->role}");
    }
}
