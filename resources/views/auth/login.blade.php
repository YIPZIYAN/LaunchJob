<x-auth-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-application-logo class=" mb-6"/>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>
            <livewire:login-form/>
        </div>
    </section>
</x-auth-layout>
