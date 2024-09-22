<?php

namespace App\Factory;

interface ProfileInterface
{
    public function getProfileDetails();
    public function saveProfileDetails(array $data);
}
