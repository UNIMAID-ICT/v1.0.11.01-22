<div>
    <x-jet-dialog-modal wire:model:model="edit_course_modal">

        <x-slot name="title">
            <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-blue-600">
            <span class="ml-4 font-bold text-white">Edit COURSE</span>
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
                                <x-jet-input class="w-full" type="text" wire:model.defer="course_title"  placeholder="Course Title"  />
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
                                <x-jet-input class="w-full" type="text" wire:model.defer="course_code"  placeholder="Course Code"  />
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
                                <x-jet-input class="w-full" type="text" wire:model.defer="units"  placeholder="Course Units"  />
                            </div>
                            <x-jet-input-error for="units" class="mt-2" />
                        </div>
                    </div>

                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="mode" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Mode
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.defer="mode" id="mode">
                                    <div class="px-4 overflow-y-auto">

                                        <option>Select Mode</option>
                                        @foreach (App\Models\Assets::MODE as $value => $label)
                                                <option class="cursor-pointer">
                                                {{$label}} </option>
                                        @endforeach

                                    </div>
                                </x-input.select>
                            </div>
                            <x-jet-input-error for="mode" class="mt-2" />
                        </div>
                    </div>

                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="elective" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Eelective
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.defer="elective" id="elective">
                                    <div class="px-4 overflow-y-auto">

                                        <option>Select Elective</option>
                                        @foreach (App\Models\Assets::ELECTIVE as $value => $label)
                                                <option class="cursor-pointer">
                                                {{$label}} </option>
                                        @endforeach

                                    </div>
                                </x-input.select>
                            </div>
                            <x-jet-input-error for="elective" class="mt-2" />
                        </div>
                    </div>

                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="pre_requisite" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Pre_requisite
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.defer="pre_requisite" id="pre_requisite">
                                    <div class="px-4 overflow-y-auto">

                                        <option>Select Pre-Requisite</option>
                                        @foreach (App\Models\Assets::PRE_REQUISITE as $value => $label)
                                                <option class="cursor-pointer">
                                                {{$label}} </option>
                                        @endforeach

                                    </div>
                                </x-input.select>
                            </div>
                            <x-jet-input-error for="pre_requisite" class="mt-2" />
                        </div>
                    </div>
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="level" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Level
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.defer="level_pivot_offer" id="level_pivot_offer">
                                    <div class="px-4 overflow-y-auto">

                                        <option>Select Level</option>
                                        @foreach (App\Models\Assets::LEVEL as $value => $label)
                                                <option class="cursor-pointer">
                                                {{$label}} </option>
                                        @endforeach

                                    </div>
                                </x-input.select>
                            </div>
                            <x-jet-input-error for="level_pivot_offer" class="mt-2" />
                        </div>
                    </div>

                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="semester_offer" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Semester
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.defer="semester_pivot_offer" id="semester_pivot_offer">
                                    <div class="px-4 overflow-y-auto">
                                        <option>Select Semester</option>
                                        @foreach (App\Models\Assets::SEMESTER as $value => $label)
                                                <option class="cursor-pointer">
                                                {{$label}} </option>
                                        @endforeach
                                    </div>
                                </x-input.select>
                            </div>
                            <x-jet-input-error for="semester_pivot_offer" class="mt-2" />
                        </div>
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
        <!-- Add record buttons -->
        <div class="flex items-center justify-between w-full space-x-4">


                    <div class="flex items-center justify-between w-full space-x-4">
                        <x-jet-button wire:click.prevent="done" wire:loading.attr="disabled" wire:target="done, updateCourse" >
                           {{ __('Done') }}
                        </x-jet-button>

                        <div class="flex items-center justify-between space-x-4">
                            <x-jet-action-message class="" on="saved">
                                    {{ __('Saved') }}
                            </x-jet-action-message>
                            <x-jet-button wire:click.prevent="updateCourse" wire:target="updateCourse, done" wire:loading.attr="disabled"
                             class="bg-green-500 hover:bg-green-700" >
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </div>

        </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>


