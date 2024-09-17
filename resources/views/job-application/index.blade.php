<x-guest-layout>
    <div class="max-w-[85rem] p-4 mx-auto">
        <x-tables.base-table
            header="My Job Application List ({{$jobApplications->count()}})"
            :thead="['No.', 'Job Name', 'Company', 'Status', 'Updated At', 'Applied At','Action']">
            @forelse($jobApplications as $key => $jobApplication)
                <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800 cursor-pointer">
                    <x-tables.table-data>
                        {{ $key+1 }}
                    </x-tables.table-data>

                    <x-tables.table-data>
                        {{ $jobApplication->jobPost->name }}
                    </x-tables.table-data>

                    <x-tables.table-data>
                        <div class="flex justify-start items-center p-4">
                            <x-wireui-avatar lg icon="building-office-2"
                                             :src="$jobApplication->jobPost->company->avatar == null ? '' :
                                                               asset('storage/'.$jobApplication->jobPost->company->avatar)"/>
                            <span class="block ml-4 text-l text-gray-600 dark:text-gray-400">
                            {{ $jobApplication->jobPost->company->name }}
                        </span>
                        </div>
                    </x-tables.table-data>

                    <x-tables.table-data>
                        <x-state-badge status="{{$jobApplication->status}}"/>
                    </x-tables.table-data>

                    <x-tables.table-data>
                        {{ $jobApplication->updated_at }}
                    </x-tables.table-data>

                    <x-tables.table-data>
                        {{ $jobApplication->created_at }}
                    </x-tables.table-data>

                    <x-tables.table-data>
                        <x-wireui-button outline label="View"/>
                    </x-tables.table-data>
                </tr>
            @empty
                <x-tables.table-empty/>
            @endforelse
        </x-tables.base-table>
    </div>
</x-guest-layout>
