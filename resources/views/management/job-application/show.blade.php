<x-app-layout>
    <div class="p-4 space-y-8">
        <x-wireui-card class="max-w-[85rem] p-4 mx-auto">
            <x-slot name="title" class="text-xl font-semibold">
                <span class="mr-2">{{__('Applicant Details')}}</span>
            </x-slot>

            <!-- Profile -->
            <div class="flex items-center gap-x-3">
                <div class="shrink-0">
                    <x-wireui-avatar xl
                                     icon="building-office-2"
                                     :src="$jobApplication->user->avatar == null ? '': asset('storage/'.$jobApplication->user->avatar)"/>
                </div>

                <div class="grow">
                    <h1 class="text-lg font-medium text-gray-800 dark:text-neutral-200">
                        {{$jobApplication->user->name}}
                        <x-wireui-badge info flat label="{{$jobApplication->user->employee->profession}}"/>
                    </h1>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        {{$jobApplication->user->email}}
                    </p>
                </div>
            </div>
            <!-- End Profile -->

            <!-- About -->
            <div class="mt-8">
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{$jobApplication->user->employee->about}}
                </p>
            </div>
            <!-- End About -->
        </x-wireui-card>
        <livewire:job-state.state-button :job-application="$jobApplication"/>

        @if($jobApplication->interviews->isNotEmpty())
            <div class="max-w-[85rem] mx-auto">
                <x-tables.base-table
                        header="Scheduled Interview ({{$jobApplication->interviews->count()}})"
                        :thead="['Date','Mode','Location / Link','Description', 'Start At', 'End At','Action']">
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
                            <x-tables.table-data>
                                <x-wireui-button outline label="Edit" href="{{route('management.interview.edit',$interview)}}"
                                target="_blank"/>
                            </x-tables.table-data>
                        </tr>
                    @empty
                        <x-tables.table-empty/>
                    @endforelse
                </x-tables.base-table>
            </div>
        @endif

    </div>
</x-app-layout>
