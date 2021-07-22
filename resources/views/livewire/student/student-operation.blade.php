<div class="mx-3 mt-20 mb-6 sm:mx-20">
    <x-slot name="header">
        <h2 class="flex justify-between pt-6 text-3xl font-semibold leading-tight text-gray-800 uppercase sm:pt-0">
            {{ $department->dept_title }}
        </h2>
    </x-slot>

    <div class="flex justify-end my-1 space-x-4">

          <label for="search" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            SEARCH
          </label>

          <x-jet-input  type="text" wire:model="search"  class="uppercase w-36 " id="search" placeholder="Student ID"  />

    </div>
          <!-- Transactions Table -->

    <div class="flex-col space-y-4">
        <x-table>
            <x-slot name="head">
                {{-- <x-table.heading class="">s/no</x-table.heading> --}}
                <x-table.heading class="">ID NUMBER</x-table.heading>
                <x-table.heading>Title</x-table.heading>
                <x-table.heading>FUll Name</x-table.heading>
                <x-table.heading>Gender</x-table.heading>
                <x-table.heading>LEVEL</x-table.heading>
                <x-table.heading></x-table.heading>
            </x-slot>

            <x-slot name="body">

                @forelse ($level_students as $student)

                {{-- @forelse($department->subsidiries as $course) --}}

                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $student->id }}">

                        <x-table.cell>
                            <span class="font-medium capitalize text-cool-gray-900"> {{ $student->student_id_number }} </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  uppercase">
                                {{ $student->title }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                {{ $student->fullname }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $student->gender }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $student->level }}
                        </x-table.cell>


                        <x-table.cell>

                            <div class="flex justify-between space-x-1">

                                <x-button.link wire:click="openCarryOverModel" class="px-2 py-1 text-white bg-blue-500 rounded-md">Add Carry Over</x-button.link>

                                {{-- <x-button.link wire:click="" class="px-2 py-1 text-white bg-green-500 rounded-md">Confirm</x-button.link> --}}

                                {{-- <x-button.link wire:click="" class="px-2 py-1 text-white bg-red-500 rounded-md">Delete</x-button.link> --}}

                            </div>

                        </x-table.cell>
                    </x-table.row>

                @empty

                {{-- @endforelse --}}

                {{-- @empty --}}
                <x-table.row>
                    <x-table.cell colspan="6">
                        <div class="flex items-center justify-center space-x-2">
                            <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                            <span class="py-8 text-xl font-medium text-cool-gray-400"></span>
                        </div>
                    </x-table.cell>
                </x-table.row>
                @endforelse

            </x-slot>
        </x-table>
        <div>{{  $level_students->links() }}</div>
    </div>

    <x-modal.dialog wire:model="showStudentCarryOverModal">
        <x-slot name="title"><div>Student Carry Over</div></x-slot>

        <x-slot name="content">

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                <div class="flex space-x-1">
                  <label for="ca" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    CA
                  </label>
                  <span class="text-red-500">*</span>
                </div>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <x-jet-input  type="text" wire:model.defer="ca"  class="w-full uppercase " id="ca" placeholder="CA"  />
                  <x-jet-input-error for="ca" class="mt-2" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                <div class="flex space-x-1">
                  <label for="exam" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Exam
                  </label>
                  <span class="text-red-500">*</span>
                </div>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <x-jet-input  type="text" wire:model.defer="exam"  class="w-full upperexamse " id="exam" placeholder="Exam"  />
                  <x-jet-input-error for="exam" class="mt-2" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                <div class="flex space-x-1">
                  <label for="total" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Total Scores
                  </label>
                  <span class="text-red-500">*</span>
                </div>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <x-jet-input  type="text" wire:model.defer="total"  class="w-full uppertotalse " id="total" placeholder="Total"  />
                  <x-jet-input-error for="total" class="mt-2" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                <div class="flex space-x-1">
                    <label for="remark" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Remark
                    </label>
                    <span class="text-red-500">*</span>
                </div>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input.select  wire:model="remark"  class="w-full" id="remark">
                        <div class="px-4 overflow-y-auto">
                            <option>Select Remark</option>
                            @foreach (App\Models\Assets::REMARK as $value => $label)
                                <option class="cursor-pointer">{{$label}} </option>
                            @endforeach
                        </div>
                    </x-input.select>
                    {{-- <x-jet-input  type="text"  wire:model.defer="gender" class="w-full uppercase" id="gender" placeholder="gender"  />           --}}
                    <x-jet-input-error for="remark" class="mt-2" />
                </div>
            </div>


        </x-slot>

        <x-slot name="footer">
            <div>
                <x-jet-button wire:click.prevent="done" wire:target="done, submit" wire:loading.attr="disabled"
                     class="bg-blue-400" >
                        {{ __('cancle') }}
                </x-jet-button>
             {{-- @if($done) --}}
                <x-jet-button wire:click.prevent="submit" class="bg-green-400 hover:bg-green-700"
                     wire:target="submit, done" wire:loading.attr="disabled">
                        {{ __('submit') }}
                </x-jet-button>
            {{-- @endif --}}
            </div>
        </x-slot>
</x-modal.dialog>

</div>
