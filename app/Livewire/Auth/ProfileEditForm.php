<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileEditForm extends Component
{

    public $user;
    public $name;
    public $email;

    public function mount() {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user->id)],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->user->fill($validatedData);

        $this->user->save();

        $message = $this->user->wasChanged()
            ? ['success' => 'Profile information updated successfully.']
            : ['info' => 'No changes were made to the profile information.'];

        return redirect()->route('profile.edit')->with($message);

    }

    public function render()
    {
        return view('livewire.auth.profile-edit-form');
    }
}
