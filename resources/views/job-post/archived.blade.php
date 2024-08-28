<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 space-y-6">
        <div class="max-w-xl">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Archived Job') }}
                    </h2>
                </header>

            </section>
        </div>
    </div>

    <!-- Table Section -->
    <div class="max-w-[85rem] p-4 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                ID
                                            </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Title
                                            </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Deleted At
                                            </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Action
                                            </span>
                                    </div>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($jobPosts as $jobPost)
                                <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                                    <td class="size-px whitespace-nowrap align-top">
                                            <span class="block p-6 text-l text-gray-600 dark:text-gray-400">
                                                {{ $jobPost->id }}
                                            </span>
                                    </td>
                                    <td class="size-px whitespace-nowrap align-top">
                                            <span class="block p-6 text-l text-gray-600 dark:text-gray-400">
                                                {{ $jobPost->name }}
                                            </span>
                                    </td>
                                    <td class="size-px whitespace-nowrap align-top">
                                            <span class="block p-6 text-l text-gray-600 dark:text-gray-400">
                                                {{ $jobPost->deleted_at }}
                                            </span>
                                    </td>
                                    <td class="size-px whitespace-nowrap align-top">
                                            <span class="block p-4 text-l text-gray-600 dark:text-gray-400">
                                                <form method="get" action="{{ route('job-post.restore', $jobPost->id) }}">
                                                    @csrf
                                                    @method('get')

                                                    <div>
                                                        <x-primary-button data-modal-target="popup-modal"
                                                                          data-modal-toggle="popup-modal" type="button">
                                                            {{ __('Unarchive') }}
                                                        </x-primary-button>

                                                        <x-confirm-modal id="popup-modal" :message="'Are you sure you want to unarchive this job?'">
                                                            <x-primary-button data-modal-hide="popup-modal" type="s"
                                                                             class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Yes, I'm sure
                                                            </x-primary-button>
                                                            <button data-modal-hide="popup-modal" type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                                No, cancel
                                                            </button>
                                                        </x-confirm-modal>
                                                    </div>
                                                </form>
                                            </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->


</x-app-layout>
