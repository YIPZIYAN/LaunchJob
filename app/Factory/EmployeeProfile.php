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
            'profession' => $this->user->employee->profession,
            'resume' => $this->user->employee->resume,
            'about'=> $this->user->employee->about,
            // Additional fields specific to employee profile
        ];
    }

    public function saveProfileDetails(array $data)
    {
        $this->user->employee->update($data);
    }
}
