<div class="mx-3 mt-10 mb-6">
    <div class="my-0 space-y-3">


        <div class="relative flex flex-col justify-start p-3 space-x-2 space-y-4 border-2">
            <div class="">BIOLOGICAL SCIENCES</div>

        </div>
        <!-- Transactions Table -->


        <div wire:loading wire:target="botany, biological, zoo "  class="absolute z-30 space-x-4 left-1/3 animate-pulse">
          <div class="flex items-center justify-center text-white bg-green-300 rounded-full w-36 h-36">Reading..</div>
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

                @if ($biologicalSciCourses)
                @forelse ($biologicalSciCourses as $department)

                {{-- @forelse($department->subsidiries as $course) --}}
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
                            @if ($course->pivot->status == null)
                            <div class="flex justify-between space-x-1">

                                <x-button.link wire:click="open_edit_modal({{ $course->id }})" class="px-2 py-1 text-white bg-yellow-500 rounded-md">Edit</x-button.link>

                                <x-button.link wire:click="confirmCourse({{ $course->id }} , {{ $department->id }})" class="px-2 py-1 text-white bg-green-500 rounded-md">Confirm</x-button.link>

                                <x-button.link wire:click="deleteCourse({{ $course->id }} , {{ $department->id }})" class="px-2 py-1 text-white bg-red-500 rounded-md">Delete</x-button.link>
                            </div>
                            @endif
                        </x-table.cell>
                    </x-table.row>

                {{-- @empty

                @endforelse --}}

                @empty
                <x-table.row>
                    <x-table.cell colspan="6">
                        <div class="flex items-center justify-center space-x-2">
                            <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                            <span class="py-8 text-xl font-medium text-cool-gray-400"></span>
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

