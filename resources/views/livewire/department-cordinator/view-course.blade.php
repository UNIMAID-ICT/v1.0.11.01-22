<x-slot name="header">
  <h1 class="relative text-xlg md:text-3xl pt-4 sm:pt-0 uppercase">Course Manager</h1>
  <x-notification />
</x-slot>
<div>
    <div class="my-10">
            <!-- Transactions Table -->
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['title'] ?? null" class="">s/no</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('amount')" :direction="$sorts['Name'] ?? null">COURSE CODE</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['student_id_number'] ?? null" class="">COURSE TITLE</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('status')" :direction="$sorts['faculity'] ?? null">SEMESTER</x-table.heading>
                     <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">ACTION</x-table.heading>
                   
                </x-slot>

                <x-slot name="body">
                    {{--  work on displaying courses according to there programme--}}
                    @forelse ($departments as $department)
                    @foreach ($department->courses as $course)
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
                            <span class="font-medium text-cool-gray-900">{{ $course->course_code }}  </span> 
                        </x-table.cell>

                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                            <x-table.cell>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize"> 
                                {{ $course->course_title }}
                                </span>
                            </x-table.cell>
                            <x-table.cell>
                                
                                <div class="flex space-x-6"><x-jet-label for="{{ $course->semester }}" value="{{ $course->semester }}" /></div>
                            </x-table.cell>
                            <x-table.cell>
                                   
                                <div class="flex space-x-6">
                                    <div>
                                        <x-jet-label for="{{ $course->semester }}" value="FIRST" />                          
                                        <x-input.radio  wire:model.defer="semester_first_second"  name="{{ $course->course_code }} " value="FIRST">
                                        </x-input.radio>
                                    </div>
                                
                                    <div>
                                        <x-jet-label for="{{ $course->semester }}" value="SECOND" />
                                        <x-input.radio  wire:model.defer="semester_first_second" name="{{ $course->course_code }} " value="SECOND">
                                        </x-input.radio>
                                    </div>
                                </div>
                            </x-table.cell>

                            {{-- <x-table.cell>
                                {{ $result['remark'] }}                             
                            </x-table.cell> --}}

                        {{-- <x-table.cell>
                            <div class="flex justify-between">
                                <x-button.link wire:click="" class="bg-blue-500 text-white py-1 px-2 rounded-md">Edit</x-button.link>
                                <x-button.link wire:click="removeFee({{$fee->id}})" class="bg-red-500 text-white py-1 px-2 rounded-md" >Delete</x-button.link>
                            </div>
                            </x-table.cell>
                         --}}

                    </x-table.row>
                    @endforeach
                    @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="flex items-center justify-center space-x-2">
                                <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                                <span class="py-8 text-xl font-medium text-cool-gray-400">No Fee Added...</span>
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
</div>
