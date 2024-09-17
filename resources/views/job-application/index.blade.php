<x-guest-layout>
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
                                                No.
                                            </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Job Name
                                            </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Company
                                            </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Status
                                            </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Updated At
                                            </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Applied At
                                            </span>
                                    </div>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($jobApplications as $key => $jobApplication)
                                <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800 cursor-pointer">
                                    <td class="size-px whitespace-nowrap">
                                            <span class="block p-4 text-l text-gray-600 dark:text-gray-400">
                                                {{ $key+1 }}
                                            </span>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                            <span class="block p-4 text-l text-gray-600 dark:text-gray-400">
                                                {{ $jobApplication->jobPost->name }}
                                            </span>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="flex justify-start items-center p-4">
                                            <x-wireui-avatar lg icon="building-office-2"
                                                             :src="$jobApplication->jobPost->company->avatar == null ? '' :
                                                               asset('storage/'.$jobApplication->jobPost->company->avatar)"/>

                                            <span class="block ml-4 text-l text-gray-600 dark:text-gray-400">
                                                {{ $jobApplication->jobPost->company->name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                            <span class="block p-4 text-l text-gray-600 dark:text-gray-400">
                                                @switch($jobApplication->status)
                                                    @case("accepted")
                                                        <x-wireui-badge positive flat
                                                                        label="{{ $jobApplication->status }}"/>
                                                        @break
                                                    @case("rejected")
                                                        <x-wireui-badge negative flat
                                                                        label="{{ $jobApplication->status }}"/>
                                                        @break
                                                    @default
                                                        <x-wireui-badge flat label="{{ $jobApplication->status }}"/>
                                                @endswitch

                                            </span>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                            <span class="block p-4 text-l text-gray-600 dark:text-gray-400">
                                                {{ $jobApplication->updated_at }}
                                            </span>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                            <span class="block p-4 text-l text-gray-600 dark:text-gray-400">
                                                {{ $jobApplication->created_at }}
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
</x-guest-layout>
