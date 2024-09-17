<x-guest-layout>
    <div class="max-w-[85rem] p-4 mx-auto">
        <x-tables.base-table
            header="My Interview Schedule List ({{$interviews->count()}})"
            :thead="['No.', 'Job Name', 'Company', 'Mode', 'Start At', 'End At','Action']">
            @forelse($interviews as $key => $interview)
                <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800 cursor-pointer">
                    <x-tables.table-data>
                        {{ $key+1 }}
                    </x-tables.table-data>

                    <x-tables.table-data>
                        {{ $interview->jobApplication->jobPost->name }}
                    </x-tables.table-data>

                    <x-tables.table-data>
                        <div class="flex justify-start items-center p-4">
                            <x-wireui-avatar lg icon="building-office-2"
                                             :src="$interview->jobApplication->jobPost->company->avatar == null ? '' :
                                             asset('storage/'.$interview->jobApplication->jobPost->company->avatar)"/>
                            <span class="block ml-4 text-l text-gray-600 dark:text-gray-400">
                            {{ $interview->jobApplication->jobPost->company->name }}
                        </span>
                        </div>
                    </x-tables.table-data>

                    <x-tables.table-data>
                        @if($interview->mode == 'physical')
                            <x-wireui-badge info flat label="{{$interview->mode}}" icon="building-office" />
                        @else
                            <x-wireui-badge positive flat label="{{$interview->mode}}" icon="video-camera"/>
                        @endif
                    </x-tables.table-data>

                    <x-tables.table-data>
                        {{ $interview->start_time }}
                    </x-tables.table-data>

                    <x-tables.table-data>
                        {{ $interview->end_time }}
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
