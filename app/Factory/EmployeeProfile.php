<?php

namespace App\Factory;

use App\Models\User;

class EmployeeProfile implements ProfileInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getProfileDetails()
    {
        return [
            'name' => $this->user->company->name,
            'email' => $this->user->company->address,
            // Additional fields specific to employee profile
        ];    }

    public function saveProfileDetails(array $data)
    {
        $this->user->company->update($data);
    }
}
