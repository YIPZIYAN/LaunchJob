<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEditForm extends Component
{

    use WithFileUploads;

    public $user;

    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $avatar;

    public $name;
    public $email;

    public function mount()
    {
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

        if ($this->avatar) {

            if ($this->user->avatar) {
                Storage::disk('public')->delete($this->user->avatar);
            }

            $validatedData['avatar'] = $this->avatar->store('avatars', 'public');;

//            $file = $this->avatar->store('avatars', 'public');
//            $this->user->update(['avatar' => $file]);

        }

        $this->user->update($validatedData);

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
