<div class="max-w-[85rem] mx-auto">
    <x-tables.base-table
        header="Scheduled Interview ({{$jobApplication->interviews->count()}})"
        :thead="['Date','Mode','Location / Link','Description', 'Start At', 'End At']">
        @forelse($jobApplication->interviews->sortByDesc('date') as $key => $interview)
            <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800 cursor-pointer">

                <x-tables.table-data>
                    {{ $interview->date }}
                </x-tables.table-data>
                <x-tables.table-data>
                    @if($interview->mode == 'physical')
                        <x-wireui-badge info flat label="{{$interview->mode}}" icon="building-office"/>
                    @else
                        <x-wireui-badge positive flat label="{{$interview->mode}}" icon="video-camera"/>
                    @endif
                </x-tables.table-data>

                <x-tables.table-data>
                    @if($interview->mode == 'physical')
                        {{$interview->location}}
                    @else
                        <x-wireui-link target="_blank" href="{{$interview->link}}">
                            {{$interview->link}}
                        </x-wireui-link>
                    @endif
                </x-tables.table-data>

                <x-tables.table-data>
                    {{ $interview->description }}
                </x-tables.table-data>



                <x-tables.table-data>
                    {{ $interview->start_time }}
                </x-tables.table-data>

                <x-tables.table-data>
                    {{ $interview->end_time }}
                </x-tables.table-data>
            </tr>
        @empty
            <x-tables.table-empty/>
        @endforelse
    </x-tables.base-table>
</div>

