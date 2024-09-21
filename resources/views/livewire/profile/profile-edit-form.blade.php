<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form class="mt-6 space-y-6" wire:submit.prevent="submit">

                        <div>
                            <x-input-label for="avatar" value="Avatar"/>
                            <div class="flex space-x-2 mt-2">
                                <x-wireui-avatar lg
                                                 icon="user"
                                                 :src="Auth::user()->avatar == null ? '': asset('storage/'.Auth::user()->avatar)"/>
                                <div>
                                    <input
                                        wire:model="avatar"
                                        class="block m-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="file_input" type="file">
                                    @error('avatar')
                                    <div class="text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-wireui-input
                                wire:model="name"
                                label="Name"
                                placeholder="Enter name"
                            />
                        </div>

                        <div>
                            <x-wireui-input
                                wire:model="email"
                                label="Email"
                                placeholder="Enter email"
                                readonly
                            />

                        </div>

                        <div class="flex items-center gap-4">
                            <x-wireui-button type="submit" label="Save"/>
                        </div>
                    </form>
                </section>

            </div>
        </div>

        @role('employee')
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.employee-profile-form/>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.interest-job-type-form/>
            </div>
        </div>
        @endrole

        @role('company')
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.company-profile-form/>
            </div>
        </div>
        @endrole

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.change-password-form/>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.delete-user-form/>
            </div>
        </div>
    </div>
</div>
