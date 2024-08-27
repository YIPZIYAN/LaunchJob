{{$jobPost}}
<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 space-y-6">
        <div class="max-w-xl">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Edit Job Details') }}
                    </h2>
                </header>

                <form method="post" action="{{ route('job-post.update', $jobPost) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div>
                        <x-input-label for="name" :value="__('Job Name')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                      :value="old('name', $jobPost->name)" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')"/>
                        <x-textarea-input id="description" name="description" type="text"
                                          class="mt-1 block w-full" required autofocus
                                          content="{{ old('description', $jobPost->description) }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                    </div>

                    <div>
                        <x-input-label for="location" :value="__('Location')"/>
                        <x-textarea-input id="location" name="location" type="text"
                                          class="mt-1 block w-full" required autofocus content="{{ old('location', $jobPost->location) }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('location')"/>
                    </div>

                    <div>
                        <x-input-label for="Min Salary (RM)" :value="__('Min Salary')"/>
                        <x-text-input id="min_salary" name="min_salary" type="number" class="mt-1 block w-full"
                                      :value="old('min_salary', $jobPost->min_salary)" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('min_salary')"/>
                    </div>

                    <div>
                        <x-input-label for="Max Salary (RM)" :value="__('Max Salary')"/>
                        <x-text-input id="max_salary" name="max_salary" type="number" class="mt-1 block w-full"
                                      :value="old('max_salary', $jobPost->max_salary)" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('max_salary')"/>
                    </div>

                    <div>
                        <x-input-label for="Period" :value="__('Period')"/>
                        <x-radio-input id="full-time" value="Full-time" name="period" label="Full-time"
                                       :checked="old('period', $jobPost->period) === 'Full-time'"/>
                        <x-radio-input id="part-time" value="Part-time" name="period" label="Part-time"
                                       :checked="old('period',$jobPost->period) === 'Part-time'"/>
                        <x-radio-input id="contract" value="Contract" name="period" label="Contract"
                                       :checked="old('period', $jobPost->period) === 'Contract'"/>
                        <x-radio-input id="internship" value="Internship" name="period" label="Internship"
                                       :checked="old('period', $jobPost->period) === 'Internship'"/>
                        <x-radio-input id="freelance" value="Freelance" name="period" label="Freelance"
                                       :checked="old('period', $jobPost->period) === 'Freelance'"/>
                        <x-input-error class="mt-2" :messages="$errors->get('period')"/>
                    </div>

                    <div>
                        <x-input-label for="Mode" :value="__('Mode')"/>
                        <x-radio-input id="on-site" value="On-site" name="mode" label="On-site"
                                       :checked="old('mode', $jobPost->mode) === 'On-site'"/>
                        <x-radio-input id="remote" value="Remote" name="mode" label="Remote"
                                       :checked="old('mode', $jobPost->mode) === 'Remote'"/>
                        <x-radio-input id="hybrid" value="Hybrid" name="mode" label="Hybrid"
                                       :checked="old('mode', $jobPost->mode) === 'Hybrid'"/>
                        <x-input-error class="mt-2" :messages="$errors->get('mode')"/>
                    </div>

                    <div>
                        <x-input-label for="Type" :value="__('Type')"/>
                        <select id="type" name="type"
                                class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled {{ old('type') ? '' : 'selected' }}>Choose type</option>
                            <option value="US" {{ old('type', $jobPost->type) === 'US' ? 'selected' : '' }}>Information Technology
                            </option>
                            <option value="CA" {{ old('type', $jobPost->type) === 'CA' ? 'selected' : '' }}>Accounting</option>
                            <option value="FR" {{ old('type', $jobPost->type) === 'FR' ? 'selected' : '' }}>Others</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('type')"/>
                    </div>


                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-app-layout>
