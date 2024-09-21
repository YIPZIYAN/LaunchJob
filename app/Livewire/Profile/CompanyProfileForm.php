<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyProfileForm extends Component
{
    use WithFileUploads;

    public $company;
    public $name;
    public $address;
    public $description;

    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $avatar;

    public function mount()
    {
        $this->company = auth()->user()->company;
        $this->name = $this->company->name;
        $this->address = $this->company->address;
        $this->description = $this->company->description;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        if ($this->avatar) {
            if ($this->company->avatar) {
                Storage::disk('public')->delete($this->company->avatar);
            }
            $validatedData['avatar'] = $this->avatar->store('avatars', 'public');;
        } else {
            $validatedData['avatar'] = $this->company->avatar;
        }

        $this->company->update($validatedData);

        $message = $this->company->wasChanged()
            ? ['success' => 'Profile information updated successfully.']
            : ['info' => 'No changes were made to the profile information.'];

        return redirect()->route('profile.edit')->with($message);
    }

    public function render()
    {
        return view('livewire.profile.company-profile-form');
    }
}
