<div class="max-w-[85rem] mx-auto">
    <x-tables.base-table
        header="Applicant List ({{$jobPost->users->count()}})"
        :thead="['Name','Email', 'Status', 'Applied At','Updated At','Action']">
        @forelse($jobPost->users->sortByDesc('pivot.created_at') as $user)
            <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800 cursor-pointer">
                <x-tables.table-data>
                    {{ $user->name }}
                </x-tables.table-data>

                <x-tables.table-data>
                    {{ $user->email }}
                </x-tables.table-data>

                <x-tables.table-data>
                    <x-state-badge :status="$user->pivot->status"/>
                </x-tables.table-data>

                <x-tables.table-data>
                    {{ $user->pivot->created_at }}
                </x-tables.table-data>

                <x-tables.table-data>
                    {{ $user->pivot->updated_at }}
                </x-tables.table-data>
                <x-tables.table-data>
                    <x-wireui-button
                        href="{{route('management.job-application.show', [$jobPost,$user])}}"
                        outline label="View"/>
                </x-tables.table-data>
            </tr>
        @empty
            <x-tables.table-empty/>
        @endforelse
    </x-tables.base-table>
</div>

