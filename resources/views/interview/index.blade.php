<x-guest-layout>
    <div class="max-w-[85rem] p-4 mx-auto space-y-8">
        <x-interview-timetable :header="__('Upcoming Interview')" :grouped-interviews="$groupedInterviews"/>
        @if($groupedInterviewsHistory->isNotEmpty())
            <x-interview-timetable :header="__('Interview History')" :grouped-interviews="$groupedInterviewsHistory"/>
        @endif
    </div>
</x-guest-layout>
