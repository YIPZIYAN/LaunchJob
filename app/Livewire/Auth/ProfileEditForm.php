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

        if ($this->user->isDirty('email')) {
            $this->user->email_verified_at = null;
        }

        $this->user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function render()
    {
        return view('livewire.auth.profile-edit-form');
    }
}
