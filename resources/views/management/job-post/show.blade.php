<x-app-layout>
    <div class="p-4 space-y-8">
        @include('management.job-post.partials.show-job-details')
        <div class="flex justify-end">
            <x-wireui-dropdown>
                <x-slot name="trigger">
                    <x-wireui-button label="Export"/>
                </x-slot>
                <x-wireui-dropdown.item label="Download XML"
                                        href="{{route('management.applicant.download',$jobPost)}}"/>
                <x-wireui-dropdown.item label="View" target="_blank"
                                        href="{{route('management.applicant.view-xml',$jobPost)}}"/>
            </x-wireui-dropdown>
        </div>
        @include('management.job-post.partials.show-applicant')
    </div>
</x-app-layout>
