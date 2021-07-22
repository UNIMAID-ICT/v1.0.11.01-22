

<div>
    <x-jet-dialog-modal  wire:model="open_add_new_school">

        <x-slot name="title">
            <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-indigo-400">
            <span class="ml-4 font-bold text-white"> ADD NEW SCHOOL</span>
            <span class="mr-6 font-bold text-white"></span>
            </div>
            <x-notification />
        </x-slot>

        <x-slot name="content">
            <div class="w-full pt-6 sm:mt-0">
                <div class="">
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="school_title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Faculty/School Title
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="school_title" id="School Title" placeholder="School Title"  />
                            </div>
                            <x-jet-input-error for="school_title" class="mt-2" />
                        </div>
                    </div>
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="school_code" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Faculty/School Code
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="school_code" placeholder="School Code"  />
                            </div>
                            <x-jet-input-error for="school_code" class="mt-2" />
                        </div>
                    </div>
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="school_no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Faculty/School Number
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="school_no" placeholder="School Number"  />
                            </div>
                            <x-jet-input-error for="school_no" class="mt-2" />
                        </div>
                    </div>

                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="school_no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Type
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.debounce.10ms="school_type" id="school_type">
                                    <div class="px-4 overflow-y-auto">
                                        <option>SELECT SCHOOL TYPE</option>
                                        @foreach (App\Models\Assets::SCHOOL_TYPE as $value => $label)
                                                <option class="cursor-pointer">
                                                {{$label}} </option>
                                        @endforeach
                                    </div>
                                </x-input.select>
                            </div>
                            <x-jet-input-error for="school_type" class="mt-2" />
                        </div>
                    </div>
                </div>
                <x-jet-input-error for="school_id" class="mt-2" />
                <x-jet-input-error for="department_id" class="mt-2" />
                <x-jet-input-error for="program_id" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
        <!-- Add record buttons -->
        <div class="flex items-center justify-between w-full space-x-4">
                <div class="flex items-center justify-between w-full space-x-4">
                    <x-jet-button wire:loading.attr="disabled" wire:target="done, saveNewSchool" wire:click.prevent="done">
                        {{ __('Done') }}
                    </x-jet-button>

                    <div class="flex items-center justify-between space-x-4">
                        <x-jet-action-message class="" on="saved">
                                {{ __('Saved') }}
                        </x-jet-action-message>
                        <x-jet-button class="bg-green-500 hover:bg-green-700" wire:loading.attr="disabled" wire:target="done, saveNewSchool"
                        wire:click.prevent="saveNewSchool">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
                </div>
        </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
{{-- End School Section --}}

<div>
    <x-jet-dialog-modal  wire:model="open_add_new_department">

        <x-slot name="title">
            <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-indigo-400">
            <span class="ml-4 font-bold text-white"> ADD NEW DEPARTMENT</span>
            <span class="mr-6 font-bold text-white"></span>
            </div>
            <x-notification />
        </x-slot>

        <x-slot name="content">
            <div class="w-full pt-6 sm:mt-0">
                <div class="">
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="dept_title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Department Title
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="dept_title" id="Department Title" placeholder="Department Title"  />
                            </div>
                            <x-jet-input-error for="dept_title" class="mt-2" />
                        </div>
                    </div>
                    {{--
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="dept_code" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Department Code
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="dept_code" placeholder="Department Code"  />
                            </div>
                            <x-jet-input-error for="dept_code" class="mt-2" />
                        </div>
                    </div>
                     --}}
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="dept_no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Department Number
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="dept_no" placeholder="Department Number"  />
                            </div>
                            <x-jet-input-error for="dept_no" class="mt-2" />
                        </div>
                    </div>
                </div>
                <x-jet-input-error for="school_id" class="mt-2" />
                <x-jet-input-error for="department_id" class="mt-2" />
                <x-jet-input-error for="program_id" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
        <!-- Add record buttons -->
        <div class="flex items-center justify-between w-full space-x-4">
                <div class="flex items-center justify-between w-full space-x-4">
                    <x-jet-button wire:loading.attr="disabled" wire:target="open_add_new_department, saveNewDepartment" wire:click.prevent="done">
                        {{ __('Done') }}
                    </x-jet-button>

                    <div class="flex items-center justify-between space-x-4">
                        <x-jet-action-message class="" on="saved">
                                {{ __('Saved') }}
                        </x-jet-action-message>
                        <x-jet-button class="bg-green-500 hover:bg-green-700" wire:loading.attr="disabled" wire:target="saveNewDepartment, open_add_new_department"
                        wire:click.prevent="saveNewDepartment">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
                </div>
        </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
{{-- End Department Section --}}

<div>
    <x-jet-dialog-modal  wire:model="open_add_new_program">

        <x-slot name="title">
            <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-indigo-400">
            <span class="ml-4 font-bold text-white"> ADD NEW PROGRAMME</span>
            <span class="mr-6 font-bold text-white"></span>
            </div>
            <x-notification />
        </x-slot>

        <x-slot name="content">
            <div class="w-full pt-6 sm:mt-0">
                <div class="">
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Programme Title
                                </label>

                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="pro_title" id="Programme Title" placeholder="Programme Title"  />
                            </div>
                            <x-jet-input-error for="pro_title" class="mt-2" />
                        </div>
                    </div>
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="code" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Programme Code
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="pro_code" id="Programme Code" placeholder="Programme Code"  />
                            </div>
                            <x-jet-input-error for="pro_code" class="mt-2" />
                        </div>
                    </div>

                </div>
                <x-jet-input-error for="school_id" class="mt-2" />
                <x-jet-input-error for="department_id" class="mt-2" />
                <x-jet-input-error for="program_id" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
        <!-- Add record buttons -->
        <div class="flex items-center justify-between w-full space-x-4">
                <div class="flex items-center justify-between w-full space-x-4">
                    <x-jet-button wire:loading.attr="disabled" wire:target="open_add_new_program, saveNewProgramme" wire:click.prevent="done">
                        {{ __('Done') }}
                    </x-jet-button>

                    <div class="flex items-center justify-between space-x-4">
                        <x-jet-action-message class="" on="saved">
                                {{ __('Saved') }}
                        </x-jet-action-message>
                        <x-jet-button class="bg-green-500 hover:bg-green-700" wire:loading.attr="disabled" wire:target="saveNewProgramme, open_add_new_program"
                        wire:click.prevent="saveNewProgramme">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
                </div>
        </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
{{-- End program Section --}}

<div>
    <x-jet-dialog-modal  wire:model="open_add_new_course">

        <x-slot name="title">
            <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-indigo-400">
            <span class="ml-4 font-bold text-white">ADD NEW COURSE</span>
            <span class="mr-6 font-bold text-white"></span>
            </div>
            <x-notification />
        </x-slot>

        <x-slot name="content">
            <div class="w-full pt-6 sm:mt-0">
                <div class="">
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1 w-28">
                                <label for="course_title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Course Title
                                </label>

                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="course_title"  placeholder="Course Title"  />
                            </div>
                            <x-jet-input-error for="course_title" class="mt-2" />
                        </div>
                    </div>
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="medical_condition" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Course Code
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="course_code"  placeholder="Course Code"  />
                            </div>
                            <x-jet-input-error for="course_code" class="mt-2" />
                        </div>
                    </div>

                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="Units" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Course Units
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="units"  placeholder="Course Units"  />
                            </div>
                            <x-jet-input-error for="units" class="mt-2" />
                        </div>
                    </div>
                    {{-- <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="semester" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Semester
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.debounce.10ms="semester" id="semester">
                                    <div class="px-4 overflow-y-auto">

                                        <option>Select Program</option>
                                        @foreach (App\Models\Assets::SEMESTER as $value => $label)
                                                <option class="cursor-pointer">
                                                {{$label}} </option>
                                        @endforeach

                                    </div>
                                </x-input.select>
                            </div>
                            <x-jet-input-error for="semester" class="mt-2" />
                        </div>
                    </div>
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="level" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Level
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full " type="text" wire:model.defer="level" id="level" placeholder="level"  />
                            </div>
                            <x-jet-input-error for="level" class="mt-2" />
                        </div>
                    </div> --}}
                </div>
                <x-jet-input-error for="school_id" class="mt-2" />
                <x-jet-input-error for="department_id" class="mt-2" />
                <x-jet-input-error for="program_id" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
        <!-- Add record buttons -->
        <div class="flex items-center justify-between w-full space-x-4">


                    <div class="flex items-center justify-between w-full space-x-4">
                        <x-jet-button wire:loading.attr="disabled" wire:target="done, saveNewCourse" wire:click.prevent="done">
                           {{ __('Done') }}
                        </x-jet-button>

                        <div class="flex items-center justify-between space-x-4">
                            <x-jet-action-message class="" on="saved">
                                    {{ __('Saved') }}
                            </x-jet-action-message>
                            <x-jet-button class="bg-green-500 hover:bg-green-700" wire:loading.attr="disabled" wire:target="saveNewCourse, done"
                            wire:click.prevent="saveNewCourse">
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </div>

        </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
{{-- End course Section --}}
