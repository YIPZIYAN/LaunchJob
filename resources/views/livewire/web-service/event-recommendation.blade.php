<div class="bg-white mt-8 pb-8">
    <div class="container mx-auto flex flex-wrap mt-2 xl:px-24 px-4">
        <p class="text-xl pt-8 pl-4 w-full font-semibold">Recommended Career Fair</p>
        @if($events == null)
            <x-wireui-alert class="mt-4" title="No event found."/>
        @else
            @foreach($events as $event)
                <div class="p-4 w-full 2xl:w-1/2">
                    <div
                        class="bg-white border rounded-xl shadow-sm sm:flex dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div
                            class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                            <img class="absolute top-0 start-0 w-full h-full object-contain"
                                 src="{{config('app.web_services_api.base_url').$event->image}}" alt="{{$event->name}}">
                        </div>
                        <div class="flex flex-wrap">
                            <div class="p-4 flex flex-col h-full sm:px-7 sm:pt-7 sm:pb-4">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    {{$event->name}}
                                </h3>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400 text-justify">
                                    Description: {{$event->description}}
                                </p>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400 text-justify">
                                    Location: {{$event->location}}
                                </p>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400 text-justify">
                                    Date: {{$event->start_date}}
                                </p>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400 text-justify">
                                    Time: {{$event->time}}
                                </p>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400 text-justify">
                                    Capacity: {{$event->capacity}}
                                </p>
                                <div class="pt-5 sm:mt-auto">
                                    <x-wireui-button class="text-xs text-blue-500 dark:text-neutral-500"
                                                     wire:click="submit({{ $event->id }})"
                                                     wire:confirm="Are you sure to join this event? You cannot unjoin and your email will be recorded."
                                                     label="Apply Now"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif

    </div>


</div>



