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
                            />

                        </div>

                        <div class="flex items-center gap-4">
                            <x-wireui-button type="submit" label="Save"/>
                        </div>
                    </form>
                </section>

            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:auth.change-password-form/>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                {{--                @include('profile.partials.delete-user-form')--}}
            </div>
        </div>
    </div>
</div>
