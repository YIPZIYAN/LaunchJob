<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Available Skill Test') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Attend skill test to build your profile.') }}
        </p>
    </header>


    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
        <thead>
        <tr>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name
            </th>
            <th scope="col"
                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

        @foreach($skill_tests as $skill_test)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $skill_test->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a href="{{route('dashboard')}}"
                       target="_blank"
                       class="hover:underline inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">JOIN</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</section>
