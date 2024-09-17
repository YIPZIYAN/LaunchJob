<div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Create an company account
        </h1>
        <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
            <div class="grid grid-cols-2 gap-4">
                <x-wireui-input
                        wire:model="name"
                        label="Name"
                        placeholder="Enter your name"
                />
                <x-wireui-input
                        wire:model="email"
                        label="Email"
                        placeholder="Enter your email"
                />
                <x-wireui-password
                        wire:model="password"
                        label="Password" placeholder="Create new password"/>
                <x-wireui-password
                        wire:model="password_confirmation"
                        label="Password Confirmation" placeholder="Re-enter the password"/>
                @if($is_new)
                    <x-wireui-input
                            class="col-span-2"
                            wire:model="company_name"
                            label="Company name"
                            placeholder="Enter company name"
                    />
                    <x-wireui-textarea
                            class="col-span-2"
                            wire:model="address"
                            label="Address" placeholder="Enter company address"/>
                    <x-wireui-textarea
                            class="col-span-2"
                            corner="Optional"
                            wire:model="description"
                            label="Description" placeholder="Write about your company"/>
                @else
                    <x-wireui-select
                            wire:model="company_id"
                            class="col-span-2"
                            label="Select your company"
                            placeholder="Select your company"
                            :async-data="route('api.company')"
                            option-label="name" option-value="id"
                    />
                @endif
            </div>

            <x-wireui-toggle
                    class="col-span-2"
                    wire:model.live="is_new"
                    id="is_new"
                    left-label="My company is not in the list."
                    xl/>

            <x-wireui-button type="submit" class="w-full" right-icon="rocket-launch" label="Launch For Jobs!"/>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Already have an account?
                <a href="{{route('login')}}"
                   class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
            </p>
        </form>
    </div>
</div>
