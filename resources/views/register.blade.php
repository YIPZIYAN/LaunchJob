<x-guest-layout>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">{{__('Launch Your Career')}}</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">
                {{__('Elevate Your Workforce, Connecting Talent with Opportunity. ')}}
            </p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card -->
            <a class="group flex flex-col focus:outline-none" href="{{route('company-register')}}">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img
                        class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
                        src="{{asset('register-enterprise.jpg')}}"
                        alt="Enterprise">
                    <span
                        class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
                      {{__('Pro')}}
                    </span>
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                        {{__('Hiring Job Seekers')}}
                    </h3>
                    <p class="mt-3 text-gray-800 dark:text-neutral-200">
                        {{__('Empower your business with top talent. Post jobs, manage applicants, and find the perfect fit to help your company thrive.')}}
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                        {{__('Register Now')}}
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group flex flex-col focus:outline-none" href="{{route('employee-register')}}">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img
                        class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
                        src="{{asset('register-employee.jpg')}}"
                        alt="Employee">
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                        {{__('Seeking For Jobs')}}
                    </h3>
                    <p class="mt-3 text-gray-800 dark:text-neutral-200">
                        {{__('Take control of your career. Browse job listings, apply with ease, and launch into new opportunities that match your skills and ambitions.')}}
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                        {{__('Register Now')}}
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group relative flex flex-col w-full min-h-60 bg-[url('https://images.unsplash.com/photo-1634017839464-5c339ebe3cb4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80')] bg-center bg-cover rounded-xl hover:shadow-lg focus:outline-none focus:shadow-lg transition"
               href="{{route('ws.room.create')}}">
                <div class="flex-auto p-4 md:p-6">
                    <h3 class="text-xl text-white/90 group-hover:text-white">
                        Unable to rent your space?
                    </h3>
                    <h3 class="text-xl text-white/90 group-hover:text-white">
                        <span class="font-bold">LaunchJob+</span>
                         has the solution! Our user-friendly room rental system makes it easy to post your room and connect with potential renters.
                    </h3>
                </div>
                <div class="pt-0 p-4 md:p-6">
                    <div
                        class="inline-flex items-center gap-2 text-sm font-medium text-white group-hover:text-white/70 group-focus:text-white/70">
                        Get started now!
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </div>
                </div>
            </a>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
</x-guest-layout>
