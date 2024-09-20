<div class="bg-white mt-8 pb-8">
    <div class="container mx-auto flex flex-wrap mt-2 xl:px-24 px-4">
        <p class="text-xl pt-8 pl-4 w-full font-semibold">Recommended Career Fair</p>

        @foreach($events as $event)
            <div class="p-4 w-full lg:w-1/2">
                <div class="bg-white border rounded-xl shadow-sm sm:flex dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                        <img class="size-full absolute top-0 start-0 object-cover" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                    </div>
                    <div class="flex flex-wrap">
                        <div class="p-4 flex flex-col h-full sm:p-7">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                {{$event->name}}
                            </h3>
                            <p class="mt-1 text-gray-500 dark:text-neutral-400 text-justify">
                                Location: {{$event->location}}
                            </p>
                            <p class="mt-1 text-gray-500 dark:text-neutral-400 text-justify">
                                Date: {{$event->start_date}} to {{$event->end_date}}
                            </p>
                            <p class="mt-1 text-gray-500 dark:text-neutral-400 text-justify">
                                Time: {{$event->time}}
                            </p>
                            <p class="mt-1 text-gray-500 dark:text-neutral-400 text-justify">
                                Capacity: {{$event->capacity}}
                            </p>
                            <div class="mt-5 sm:mt-auto">
                                <p class="text-xs text-gray-500 dark:text-neutral-500">
                                    Last updated 5 mins ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

</div>

