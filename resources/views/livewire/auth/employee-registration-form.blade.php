<div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Create an account
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
                    label="Password" placeholder="Create new password" />
                <x-wireui-password
                    wire:model="password_confirmation"
                    label="Password Confirmation" placeholder="Re-enter the password" />

                <x-wireui-select
                    wire:model="profession"
                    class="col-span-2"
                    label="Select your profession"
                    placeholder="Select a profession"
                    :options="$profession_list"
                />

                <x-wireui-textarea
                    class="col-span-2"
                    wire:model="about"
                    label="About Me" placeholder="Write about yourself" />

            </div>
            <x-wireui-button type="submit" class="w-full" right-icon="rocket-launch" label="Launch For Jobs!"/>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Already have an account?
                <a href="{{route('login')}}"
                   class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
            </p>
        </form>
    </div>
</div>
