<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @livewireStyles
    <!-- Scripts -->
    <wireui:scripts/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <nav
            class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-10">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex justify-start items-center">
                <button
                        data-drawer-target="drawer-navigation"
                        data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <svg
                            aria-hidden="true"
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                    <svg
                            aria-hidden="true"
                            class="hidden w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="sr-only">Toggle sidebar</span>
                </button>
                <x-application-logo class="mx-4"/>
            </div>
            <div class="flex items-center lg:order-2">
                <!-- Notifications -->
                <button
                        type="button"
                        data-dropdown-toggle="notification-dropdown"
                        class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                >
                    <span class="sr-only">View notifications</span>
                    <!-- Bell icon -->
                    <svg
                            aria-hidden="true"
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                        ></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div
                        class="hidden overflow-hidden z-10 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
                        id="notification-dropdown"
                >
                    <div
                            class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300"
                    >
                        Notifications
                    </div>
                    <div>
                        <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                        alt="Bonnie Green avatar"
                                />
                                <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700"
                                >
                                    <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                                        ></path>
                                        <path
                                                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                                >
                                    New message from
                                    <span class="font-semibold text-gray-900 dark:text-white"
                                    >Bonnie Green</span
                                    >: "Hey, what's up? All set for the presentation?"
                                </div>
                                <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500"
                                >
                                    a few moments ago
                                </div>
                            </div>
                        </a>
                        <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                        alt="Jese Leos avatar"
                                />
                                <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-700"
                                >
                                    <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                                >
                    <span class="font-semibold text-gray-900 dark:text-white"
                    >Jese leos</span
                    >
                                    and
                                    <span class="font-medium text-gray-900 dark:text-white"
                                    >5 others</span
                                    >
                                    started following you.
                                </div>
                                <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500"
                                >
                                    10 minutes ago
                                </div>
                            </div>
                        </a>
                        <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                                        alt="Joseph McFall avatar"
                                />
                                <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-700"
                                >
                                    <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                                >
                    <span class="font-semibold text-gray-900 dark:text-white"
                    >Joseph Mcfall</span
                    >
                                    and
                                    <span class="font-medium text-gray-900 dark:text-white"
                                    >141 others</span
                                    >
                                    love your story. See it and view more stories.
                                </div>
                                <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500"
                                >
                                    44 minutes ago
                                </div>
                            </div>
                        </a>
                        <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                                        alt="Roberta Casas image"
                                />
                                <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-700"
                                >
                                    <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                fill-rule="evenodd"
                                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                                >
                    <span class="font-semibold text-gray-900 dark:text-white"
                    >Leslie Livingston</span
                    >
                                    mentioned you in a comment:
                                    <span
                                            class="font-medium text-primary-600 dark:text-primary-500"
                                    >@bonnie.green</span
                                    >
                                    what do you say?
                                </div>
                                <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500"
                                >
                                    1 hour ago
                                </div>
                            </div>
                        </a>
                        <a
                                href="#"
                                class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/robert-brown.png"
                                        alt="Robert image"
                                />
                                <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white dark:border-gray-700"
                                >
                                    <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                                >
                    <span class="font-semibold text-gray-900 dark:text-white"
                    >Robert Brown</span
                    >
                                    posted a new video: Glassmorphism - learn how to implement
                                    the new design trend.
                                </div>
                                <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500"
                                >
                                    3 hours ago
                                </div>
                            </div>
                        </a>
                    </div>
                    <a
                            href="#"
                            class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline"
                    >
                        <div class="inline-flex items-center">
                            <svg
                                    aria-hidden="true"
                                    class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path
                                        fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"
                                ></path>
                            </svg>
                            View all
                        </div>
                    </a>
                </div>
                <button
                        type="button"
                        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button"
                        aria-expanded="false"
                        data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <x-wireui-avatar sm
                                     icon="user"
                                     :src="Auth::user()->avatar == null ? '': asset('storage/'.Auth::user()->avatar)"/>

                </button>
                <!-- Dropdown menu -->
                <div
                        class="hidden z-40 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                        id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-900 dark:text-white">
                              {{Auth::user()->name}}
                        </span>
                        <span class="block text-sm text-gray-900 truncate dark:text-white">
                            {{Auth::user()->email}}
                        </span>
                    </div>
                    <ul class="py-1 text-gray-700 dark:text-gray-300"
                        aria-labelledby="dropdown">
                        <li>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->

    <aside
            class="fixed top-0 left-0 z-0 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Sidenav"
            id="drawer-navigation"
    >
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <x-nav-link
                            href="{{ route('dashboard') }}"
                            :active="request()->routeIs(['dashboard','management.job-post.edit','management.job-post.show'])">
                        <x-heroicons::outline.home/>
                        <span class="ml-3">Dashboard</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link
                            href="{{route('management.interview.index')}}"
                            :active="request()->routeIs(['management.interview.index','management.interview.edit'])">
                        <x-heroicons::outline.calendar/>
                        <span class="ml-3">Interview</span>
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </aside>

    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="mx-4">{{ Breadcrumbs::render() }}</div>
        {{$slot}}
    </main>
</div>


@livewireScripts
</body>
</html>
