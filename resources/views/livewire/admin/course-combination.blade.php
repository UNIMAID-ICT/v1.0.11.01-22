<x-slot name="header">
  <h1 class="relative pt-4 uppercase text-xlg md:text-3xl sm:pt-0">
      Course Combination
  </h1>

</x-slot>
<div class="pb-10 mx-3 mb-6 sm:mx-20">
{{-- <h2 class="relative pt-4 uppercase text-xlg md:text-3xl sm:pt-0">Department of {{ $departments->dept_title }}</h2> --}}
    <div class="mt-10 text-sm font-bold sm:text-lg">CREATE COURSES FOR STUDENT</div>
    <x-notification/>
    <div class="space-y-3">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
            <label for="department" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                 Department
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <x-input.select wire:model="department"  class="w-full" id="department">
                    <div class="px-4 overflow-y-auto">
                        <option>Select Department</option>
                        @foreach (App\Models\Department::all() as $label)
                            <option class="cursor-pointer" value="{{$label->id}}">{{$label->dept_title}} </option>
                        @endforeach
                    </div>
                </x-input.select>
            <x-jet-input-error for="department" class="mt-2" />
            </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
            <label for="department" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                 Programme
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <x-input.select wire:model="programme"  class="w-full" id="programme">
                    <div class="px-4 overflow-y-auto">
                        <option>Select Programme</option>

                        @foreach (App\Models\Program::all() as $value => $label)
                            <option class="cursor-pointer" value="{{$label->id}}">
                                <div >{{$label->pro_code}}</div>
                                <div class="mx-3"> - </div>
                                <div>{{$label->pro_title}}</div>
                             </option>
                        @endforeach

                    </div>
                </x-input.select>
            <x-jet-input-error for="programme" class="mt-2" />
            </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
            <label for="course" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
               Course
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <x-input.select wire:model="course"  class="w-full" id="course">
                    <div class="px-4 overflow-y-auto">
                        <option>Select Course</option>
                        @if($courses)
                            @foreach ($courses as $course)
                                <option class="cursor-pointer" value="{{$course->id}}">
                                    <div class="space-x-6">
                                        <div class="uppercase">{{$course->course_code}}</div>
                                        <div class="mx-3"> - </div>
                                        <div class="uppercase">{{$course->course_title}}</div>
                                    </div>
                                </option>
                            @endforeach
                        @endif
                    </div>
                </x-input.select>
            {{-- <x-jet-input  type="text"  wire:model.defer="gender" class="w-full uppercase" id="gender" placeholder="gender"  />           --}}
            <x-jet-input-error for="course" class="mt-2" />
            </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
            <label for="level" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Level Offering
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <x-input.select wire:model="level"  class="w-full" id="level">
                    <div class="px-4 overflow-y-auto">
                        <option>Select Level</option>
                        @foreach (App\Models\Assets::LEVEL as $value => $label)
                        @if($label != 'All')
                            <option class="cursor-pointer">{{$label}} </option>
                            @endif
                        @endforeach
                    </div>
                </x-input.select>
            {{-- <x-jet-input  type="text"  wire:model.defer="gender" class="w-full uppercase" id="gender" placeholder="gender"  />           --}}
            <x-jet-input-error for="level" class="mt-2" />
            </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
            <label for="semester" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Semester Offering
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <x-input.select  wire:model="semester"  class="w-full" id="semester">
                    <div class="px-4 overflow-y-auto">
                        <option>Select Semester</option>
                        @foreach (App\Models\Assets::SEMESTER as $value => $label)
                            <option class="cursor-pointer">{{$label}} </option>
                        @endforeach
                    </div>
                </x-input.select>
            {{-- <x-jet-input  type="text"  wire:model.defer="gender" class="w-full uppercase" id="gender" placeholder="gender"  />           --}}
            <x-jet-input-error for="semester" class="mt-2" />
            </div>
        </div>


        <div class="flex justify-end space-x-4">
              {{-- <x-jet-button wire:click.prevent="gotoPrevious" wire:target="updateSponsor, gotoPrevious" wire:loading.attr="disabled"  >
                  {{ __('Reset') }}
              </x-jet-button> --}}
              <x-jet-button wire:click.prevent="createSub" wire:target="createSub" wire:loading.attr="disabled"  >
                  {{ __('Create') }}
              </x-jet-button>
          </div>
    </div>

    <div class="mb-12">
        @if($department_id)
        @livewire('admin-display.display-course-combination', ['id' => $department_id], key($department_id))
        @endif
    </div>
</div>
