<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Skill Test') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ $skill_test->name }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $skill_test->description }}
                        </p>
                    </header>

                    <form class="mt-6 space-y-6" wire:submit.prevent="submit">
                        @foreach($skill_test->questions as $question)
                            <div class="pb-4">
                                <x-input-label class="mt-1" value="{{ $question->text }} ({{ $question->points }} points)"/>

                                @foreach($question->options as $option)
                                    <x-wireui-radio id="{{ $question->id }}"
                                                    label="{{ $option->text }}"
                                                    wire:model="answers.{{ $question->id }}"
                                                    value="{{ $option->id }}"
                                                    class="mt-4"
                                    />
                                @endforeach
                            </div>
                        @endforeach


                        <div class="flex items-center gap-4">
                            <x-wireui-button type="submit" label="Submit"/>
                        </div>
                    </form>
                </section>

            </div>
        </div>


    </div>

</div>
