<div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Create an account
        </h1>
        <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
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
            <x-wireui-button type="submit" class="w-full" right-icon="rocket-launch" label="Launch For Jobs!"/>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Already have an account?
                <a href="{{route('login')}}"
                   class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
            </p>
        </form>
    </div>
</div>
