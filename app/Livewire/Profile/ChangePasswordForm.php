<?php

namespace App\Livewire\Profile;

use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class ChangePasswordForm extends Component
{

    public $user;
    public $current_password;
    public $new_password;
    public $confirm_password;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (!Hash::check($value, $this->user->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols(), 'different:current_password'],
            'confirm_password' => ['required', 'same:new_password'],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        $message = $this->user->wasChanged()
            ? ['success' => 'Password changed successfully.']
            : ['info' => 'No changes were made to the password.'];

        return redirect()->route('profile.edit')->with($message);

    }

    public function render()
    {
        return view('livewire.profile.change-password-form');
    }
}
