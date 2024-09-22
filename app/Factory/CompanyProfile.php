<?php

namespace App\Factory;

use App\Models\User;

class CompanyProfile implements ProfileInterface
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getProfileDetails()
    {
        return [
            'avatar' => $this->user->company->avatar,
            'name' => $this->user->company->name,
            'address' => $this->user->company->address,
            'description' => $this->user->company->description,
        ];
    }

    public function saveProfileDetails(array $data)
    {
        $this->user->company->update($data);

    }
}
