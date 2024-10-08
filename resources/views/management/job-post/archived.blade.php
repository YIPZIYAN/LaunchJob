<x-app-layout>
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
                                                <livewire:job-post.unarchive-job :jobPost="$jobPost"/>
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
