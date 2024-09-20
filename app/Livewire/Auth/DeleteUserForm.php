<?php

namespace App\Livewire\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
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
        return view('livewire.auth.delete-user-form');
    }
}
