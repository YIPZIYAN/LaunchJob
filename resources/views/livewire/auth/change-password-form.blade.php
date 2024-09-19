<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit.prevent="submit" action="{{ route('password.update') }}" class="mt-6 space-y-6">

        <div>
            <x-wireui-password
                wire:model="current_password"
                label="Current Password"
                placeholder="Enter current password"

            />
        </div>

        <div>
            <x-wireui-password
                wire:model="new_password"
                label="New Password"
                placeholder="Enter new password"
            />
        </div>

        <div>
            <x-wireui-password
                wire:model="confirm_password"
                label="Confirm Password"
                placeholder="Enter confirm password"
            />
        </div>

        <div class="flex items-center gap-4">
            <x-wireui-button type="submit" label="Save"/>
        </div>
    </form>
</section>
