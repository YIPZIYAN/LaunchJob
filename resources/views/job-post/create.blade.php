<x-app-layout>


    <div class="max-w-7xl mx-auto px-4 space-y-6">
        <div class="max-w-xl">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Post a New Job') }}
                    </h2>
                </header>

                <form method="post" class="mt-6 space-y-6">
                    @csrf
                    @method('post')
                    <div>
                        <x-input-label for="title" :value="__('Job Name')"/>
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                      :value="old('title')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')"/>
                        <x-textarea-input id="description" name="description" type="text"
                                          class="mt-1 block w-full" required autofocus
                                          content="{{ old('description') }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                    </div>

                    <div>
                        <x-input-label for="location" :value="__('Location')"/>
                        <x-textarea-input id="location" name="location" type="text"
                                          class="mt-1 block w-full" required autofocus content="{{ old('location') }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('location')"/>
                    </div>

                    <div>
                        <x-input-label for="Min Salary (RM)" :value="__('Min Salary')"/>
                        <x-text-input id="minSalary" name="minSalary" type="number" class="mt-1 block w-full"
                                      :value="old('minSalary')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('minSalary')"/>
                    </div>

                    <div>
                        <x-input-label for="Max Salary (RM)" :value="__('Max Salary')"/>
                        <x-text-input id="maxSalary" name="maxSalary" type="number" class="mt-1 block w-full"
                                      :value="old('maxSalary')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('maxSalary')"/>
                    </div>

                    <div>
                        <x-input-label for="Period" :value="__('Period')"/>
                        <x-radio-input id="full-time" value="Full-time" name="period" label="Full-time"
                                       :checked="true"/>
                        <x-radio-input id="part-time" value="Part-time" name="period" label="Part-time"/>
                        <x-radio-input id="contract" value="Contract" name="period" label="Contract"/>
                        <x-radio-input id="internship" value="Internship" name="period" label="Internship"/>
                        <x-radio-input id="freelance" value="Freelance" name="period" label="Freelance"/>
                    </div>

                    <div>
                        <x-input-label for="Mode" :value="__('Mode')"/>
                        <x-radio-input id="on-site" value="On-site" name="mode" label="On-site" :checked="true"/>
                        <x-radio-input id="remote" value="Remote" name="mode" label="Remote"/>
                        <x-radio-input id="hybrid" value="Hybrid" name="mode" label="Hybrid"/>
                    </div>

                    <div>
                        <x-input-label for="Type" :value="__('Type')"/>
                        <select id="type"
                                class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose type</option>
                            <option value="US">Information Technology</option>
                            <option value="CA">Accounting</option>
                            <option value="FR">Others</option>
                        </select>
                    </div>


                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Post') }}</x-primary-button>
                        <x-danger-button>{{ __('Cancel') }}</x-danger-button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-app-layout>
