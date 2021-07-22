<div class="my-10">
            <!-- Transactions Table -->
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading class="">s/no</x-table.heading>
                    <x-table.heading class="">Course Code</x-table.heading>
                    <x-table.heading >Course Title</x-table.heading>
                    <x-table.heading >Units</x-table.heading>
                    <x-table.heading >Semester</x-table.heading>
                    <x-table.heading >Level</x-table.heading>
                </x-slot>

                <x-slot name="body">

                    @forelse ($student_courses as $department)

                    @forelse($department->courses as $course)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $course->id }}">

                            <x-table.cell>
                                <span href="#" class="inline-flex space-x-2 text-sm leading-5 truncate">
                                    {{-- <x-icon.cash class="text-cool-gray-400"/> --}}
                                    <p class="truncate text-cool-gray-600">
                                        {{ $loop->iteration }}
                                    </p>
                                </span>
                            </x-table.cell>

                            <x-table.cell>
                                <span class="font-medium text-cool-gray-900"> {{ $course->course_code }} </span>
                            </x-table.cell>
                            {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                            <x-table.cell>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 capitalize">
                                {{ $course->course_title }}
                                </span>
                            </x-table.cell>

                            <x-table.cell>
                                {{ $course->units }}
                            </x-table.cell>

                            <x-table.cell>
                                {{ $course->pivot->semester_offer  }}
                            </x-table.cell>

                            <x-table.cell>
                                {{ $course->pivot->level }}
                            </x-table.cell>

                            <x-table.cell>

                                @if($course->pivot->status != 'approved')

                                    <div class="flex justify-between">
                                        <x-button.link wire:click="removeRecord({{$course->id}}, {{$department->id}})" class="px-2 py-1 text-white bg-red-500 rounded-md" >Delete</x-button.link>
                                    </div>

                                    @else

                                    <span class="capitalize">{{ $course->pivot->status}}</span>

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
                </x-slot>
            </x-table>

            <div>
                {{-- {{ $students->links() }} --}}
            </div>
        </div>
</div>
