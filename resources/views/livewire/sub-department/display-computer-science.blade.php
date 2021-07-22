<div>
    <div class="my-0 space-y-3">


        <div class="relative flex flex-col justify-start p-3 space-x-2 space-y-4 border-2">
            <div class="">COURSE BY LEVEL AND SEMESTER</div>
            <div class="flex items-center space-x-3">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-2">
                        <div class="flex space-x-1">
                            <label for="year" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Level
                            </label>
                            <span class="text-red-500">*</span>
                        </div>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <x-input.select wire:model="year"  class="w-full" id="year">
                            <div class="px-4 overflow-y-auto">
                                <option>Select Level</option>
                                @foreach (App\Models\Assets::LEVEL as $value => $label)
                                    <option class="cursor-pointer">{{$label}} </option>
                                @endforeach
                            </div>
                        </x-input.select>
                        {{-- <x-jet-input  type="text"  wire:model.defer="gender" class="w-full uppercase" id="gender" placeholder="gender"  />           --}}
                        <x-jet-input-error for="year" class="mt-2" />
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-2">
                    <div class="flex space-x-1">
                        <label for="semester" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Semester
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
            </div>
        </div>
        <!-- Transactions Table -->
        <div class="flex flex-wrap space-x-3">
            <div class="px-1 pl-1
            @if ($active == 88)
            bg-blue-300 text-white
            @else
            bg-gray-100 text-gray-500
            @endif hover:text-white hover:bg-blue-200  rounded-md shadow-sm cursor-pointer sm:px-3" wire:click="$set('computer', 88)"> COMPUTER SCIENCE</div>
            <div class="px-1 pl-1  @if ($active == 89)
            bg-blue-300 text-white
            @else
            bg-gray-100 text-gray-500
            @endif hover:text-white hover:bg-blue-200 rounded-md shadow-sm cursor-pointer sm:px-3" wire:click="$set('math', 89)"> MATHEMATICS</div>
            <div class="px-1 pl-1  @if ($active == 90)
            bg-blue-300 text-white
            @else
            bg-gray-100 text-gray-500
            @endif hover:text-white hover:bg-blue-200 rounded-md shadow-sm cursor-pointer sm:px-3" wire:click="$set('stat', 90)"> STATISTICS</div>
        </div>
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading class=""> Code</x-table.heading>
                    <x-table.heading> Titile</x-table.heading>
                    <x-table.heading>Units</x-table.heading>
                    <x-table.heading>Mode</x-table.heading>
                    <x-table.heading>Elective</x-table.heading>
                    <x-table.heading>Pre-Req</x-table.heading>
                    <x-table.heading>Semester</x-table.heading>
                    <x-table.heading>Level</x-table.heading>
                </x-slot>

                <x-slot name="body">

                @if ($student_courses)
                @forelse ($student_courses as $department)

                @forelse($department->subsidiries as $course)
                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $course->id }}">


                        <x-table.cell>
                            <span class="font-medium capitalize text-cool-gray-900"> {{ $course->course_code }} </span>
                        </x-table.cell>
                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                        <x-table.cell>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                            {{ $course->course_title }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $course->units }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $course->mode }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $course->elective }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $course->pre_requisite }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $course->pivot->semester_offer  }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $course->pivot->level }}
                        </x-table.cell>

                        <x-table.cell>
                            <x-button.link wire:click="open_edit_modal({{ $course->id }} , {{ $department->id }}, '{{ $course->pivot->created_at }}', '{{ $course->pivot->updated_at }}')" class="px-2 py-1 text-white bg-yellow-500 rounded-md">Edit</x-button.link>
                                    @if ($course->pivot->status == null)
                                    <x-button.link wire:click="confirmCourse({{ $course->id }} , {{ $department->id }}, '{{ $course->pivot->created_at }}', '{{ $course->pivot->updated_at }}')" class="px-2 py-1 text-white bg-green-500 rounded-md">Confirm</x-button.link>

                                    <x-button.link wire:click="deleteCourse({{ $course->id }} , {{ $department->id }}, '{{ $course->pivot->created_at }}', '{{ $course->pivot->updated_at }}')" class="px-2 py-1 text-white bg-red-500 rounded-md">Delete</x-button.link>
                                    @endif
                        </x-table.cell>
                    </x-table.row>

                @empty

                @endforelse

                @empty
                <x-table.row>
                    <x-table.cell colspan="6">
                        <div class="flex items-center justify-center space-x-2">
                            <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                            <span class="py-8 text-xl font-medium text-cool-gray-400">No course Added...</span>
                        </div>
                    </x-table.cell>
                </x-table.row>
                @endforelse
                @endif
                </x-slot>
            </x-table>
        </div>

        {{-- modal window --}}
        @include('modelDialog.edit_course')
    </div>
</div>

