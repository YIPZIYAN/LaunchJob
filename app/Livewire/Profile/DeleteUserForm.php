<?php

namespace App\Livewire\Profile;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DeleteUserForm extends Component
{
    public $user;
    public $password;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function rules(): array
    {
        return [
            'password' => ['required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (!Hash::check($value, $this->user->password)) {
                        $fail('The password is incorrect.');
                    }
                },
            ],
        ];
    }

    public function submit()
    {
        $this->validate();

        Auth::logout();

        $message = $this->user->delete()
            ? ['success' => 'Your account has been deleted.']
            : ['error' => 'Failed to delete the account.'];

        session()->invalidate();

        session()->regenerateToken();

        return redirect()->route('login')->with($message);
    }

    public function render()
    {
        return view('livewire.profile.delete-user-form');
    }
}
