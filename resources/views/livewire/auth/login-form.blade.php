<div
    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Log in
        </h1>
        <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <x-wireui-input
                wire:model="email"
                label="Email"
                placeholder="Enter your email"
            />
            <x-wireui-password
                wire:model="password"
                label="Password" placeholder="Enter your password"/>

            <x-wireui-checkbox id="remember" label="Remember me" wire:model="remember" value="remember"/>


            <x-wireui-button type="submit" class="w-full" label="Login"/>


            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                @if (Route::has('password.request'))
                    <a
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </p>
        </form>
    </div>
</div>
