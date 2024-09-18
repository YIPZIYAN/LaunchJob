<x-wireui-card class="max-w-[85rem] p-4 mx-auto">
    <x-slot name="title" class="text-xl font-semibold">
        <span class="mr-2">{{$header}}</span>
    </x-slot>
    <div class="space-y-4">
        @foreach($groupedInterviews as $date => $interviews)
            <h1 class="text-lg">{{$date}}</h1>
            @foreach($interviews as $interview)
                <div
                    class=" border border-gray-200 rounded-lg hover:shadow-sm focus:outline-none dark:border-neutral-700">
                    <div class="relative flex items-center overflow-hidden">
                        <div class="px-8">
                            <x-wireui-avatar xl
                                             icon="building-office-2"
                                             :src="$interview->jobApplication->jobPost->company->avatar == null ? '': asset('storage/'.$jobApplication->jobPost->company->avatar)"/>
                        </div>

                        <div class="grow py-4">
                            <div class="min-h-24 flex flex-col justify-center space-y-2">
                                <h3 class="font-bold text-md text-gray-800 dark:text-neutral-300">
                                    {{$interview->start_time}} - {{$interview->end_time}}
                                    <span class="ms-2">
                                                @if($interview->mode == 'physical')
                                            <x-wireui-badge info flat label="{{$interview->mode}}"
                                                            icon="building-office"/>
                                        @else
                                            <x-wireui-badge positive flat label="{{$interview->mode}}"
                                                            icon="video-camera"/>
                                        @endif
                                            </span>
                                </h3>

                                <h3 class="text-sm text-gray-800 dark:text-neutral-300">
                                    {{$interview->jobApplication->jobPost->name}}
                                </h3>

                                <h3 class="text-sm text-gray-800 dark:text-neutral-300">
                                    <div class="flex space-x-2 items-center truncate">
                                        @if($interview->mode == 'physical')
                                            <x-heroicons::outline.map-pin/>
                                            <span class="uppercase">{{$interview->location}}</span>
                                        @else
                                            <x-heroicons::outline.link/>
                                            <x-wireui-link target="_blank" href="{{$interview->link}}">
                                                <span>{{$interview->link}}</span>
                                            </x-wireui-link>
                                        @endif
                                    </div>
                                </h3>

                                <p class="mtext-sm text-gray-500 dark:text-neutral-500">
                                    Note: {{$interview->description}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>


</x-wireui-card>
