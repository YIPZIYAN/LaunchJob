<div>

    <form class="max-w-md mx-auto mt-8" wire:submit.prevent="submit">
        <label for="default-search"
               class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="flex flex-row">
            <x-wireui-input wire:model="search"
                            class="px-4"
                            placeholder="Search, Filter Job..."/>
            <x-wireui-button type="submit" label="Search"/>
        </div>
    </form>


    <div class="flex px-12 py-8">
        <div class="flex flex-col">
            <x-scroll-filter title="Type">
                @foreach($typeList as $type)
                    <li class="flex items-center pb-2">
                        <x-wireui-checkbox
                            wire:model="selectedType"
                            id="{{ $type }}"
                            value="{{ ++$typeId }}"
                            label="{{ $type }}"
                        />
                    </li>
                @endforeach
            </x-scroll-filter>

            <x-filter title="Period">
                @foreach($periodList as $period)
                    <li class="flex items-center">
                        <x-wireui-checkbox
                            wire:model="selectedPeriod"
                            id="{{ $period }}"
                            value="{{ $period }}"
                            label="{{ $period }}"
                        />
                    </li>
                @endforeach
            </x-filter>

            <x-filter title="Mode">
                @foreach($modeList as $mode)
                    <li class="flex items-center">
                        <x-wireui-checkbox
                            wire:model="selectedMode"
                            id="{{ $mode }}"
                            value="{{ $mode }}"
                            label="{{ $mode }}"
                        />
                    </li>
                @endforeach
            </x-filter>

            <x-filter title="Salary (RM)">
                @foreach($salaryList as $salary)
                    <li class="flex items-center">
                        <x-wireui-radio
                            wire:model="selectedSalary"
                            id="{{ $salary }}"
                            value="{{ $salary }}"
                            label="{{ $salary }}+"
                        />
                    </li>
                @endforeach
            </x-filter>
        </div>
        <div class="flex-1 overflow-y-auto h-[860px]">
            @php
                $hasRun = false;
                $rand = rand(0, count($jobPosts) - 1);
            @endphp
            @foreach($jobPosts as $key => $jobPost)
                @if(!$hasRun &&  $rand == $key)
                    @php
                        $hasRun = true;
                    @endphp
                    <div class="mb-4">
                        @include('job-application.partials.room-ads')
                    </div>
                @endif
                <x-job-card>
                    <x-wireui-avatar xl
                                     icon="building-office-2"
                                     :src="$jobPost->company->avatar == null ? '': asset('storage/'.$jobPost->company->avatar)"/>

                    <div class="flex-1">

                        <h3 class="text-lg font-medium sm:text-xl">
                            <a href="#" class="hover:underline"> {{$jobPost->name}} </a>
                        </h3>

                        <h3 class="mt-1 text-m font-medium">
                            <a href="#" class="hover:underline"> {{$jobPost->company->name}} </a>
                        </h3>

                        <p class="mt-1 text-sm text-gray-700">
                            {{$jobPost->location}}
                        </p>

                        <div class="mt-2 flex lg:flex-row space-x-2 flex-col">
                            <x-wireui-badge flat icon="clock" sm label="{{$jobPost->period}}"/>
                            <x-wireui-badge flat icon="computer-desktop" sm label="{{$jobPost->mode}}"/>
                            <x-wireui-badge flat icon="tag" sm label="{{$jobPost->jobType->name}}"/>
                        </div>

                        <h3 class="mt-4 text-m font-semibold">
                            RM {{$jobPost->min_salary}} - RM {{$jobPost->max_salary}}
                        </h3>

                        <div class="sm:flex sm:items-center sm:gap-2 justify-between">
                            <div class="flex gap-1 text-gray-500 pt-4">
                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>

                                <p class="text-xs font-medium">Posted {{$jobPost->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="flex justify-end w-full sm:w-auto">
                                @role('employee')
                                <x-wireui-button
                                    label="Apply Now"
                                    right-icon="arrow-right"
                                    href="{{ route('job-post.show', $jobPost) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                />
                                @endrole
                            </div>
                        </div>

                    </div>
                </x-job-card>
            @endforeach
        </div>

    </div>
</div>
