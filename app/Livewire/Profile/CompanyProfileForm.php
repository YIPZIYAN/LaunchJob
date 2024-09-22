<?php

namespace App\Livewire\Profile;

use App\Factory\ProfileFactory;
use Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyProfileForm extends Component
{
    use WithFileUploads;

    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $avatar;

    public $profileData = [];

    public function mount()
    {
        $profile = ProfileFactory::create(auth()->user());
        $this->profileData = $profile->getProfileDetails();
    }

    protected function rules()
    {
        return [
            'profileData.name' => ['required', 'string', 'max:255'],
            'profileData.address' => ['required', 'string', 'max:255'],
            'profileData.description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $company = auth()->user()->company;

        if ($this->avatar) {
            if ($company->avatar) {
                Storage::disk('public')->delete($company->avatar);
            }
            $validatedData['profileData']['avatar'] = $this->avatar->store('avatars', 'public');;
        } else {
            $validatedData['profileData']['avatar'] = $company->avatar;
        }

        $profile = ProfileFactory::create(auth()->user());
        $profile->saveProfileDetails($validatedData['profileData']);

        $message = $company->wasChanged()
            ? ['success' => 'Company information updated successfully.']
            : ['info' => 'No changes were made to the company information.'];

        return redirect()->route('profile.edit')->with($message);
    }

    public function render()
    {
        return view('livewire.profile.company-profile-form');
    }
}
