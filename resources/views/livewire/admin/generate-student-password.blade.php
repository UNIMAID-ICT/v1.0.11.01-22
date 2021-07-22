<div class="mx-3 mt-20 mb-6">
    <h1 class="text-2xl font-semibold text-gray-900">Generate Password</h1>
    <x-notification />
    <div class="py-4 space-y-4">
        <!-- Top Bar -->
      <div class="flex justify-between">
            <div class="flex w-2/4 space-x-4">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                    <div class="flex space-x-1">
                        <label for="semester" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            DEPARTMENT
                        </label>
                        <span class="text-red-500">*</span>
                    </div>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <x-input.select  wire:model="department"  class="w-full" id="department">
                            <div class="px-4 overflow-y-auto">
                                <option>Select Department</option>
                                @foreach ($get_departments as $student_department)
                                    <option class="cursor-pointer" value="{{ $student_department->id }}">{{ $student_department->dept_title }} </option>
                                @endforeach
                            </div>
                        </x-input.select>
                        {{-- <x-jet-input  type="text"  wire:model.defer="gender" class="w-full uppercase" id="gender" placeholder="gender"  />           --}}
                        <x-jet-input-error for="department" class="mt-2" />
                    </div>
                </div>
            </div>
            @if (($department) && ($department != 'Select Department'))
            <div wire:loading wire:target="generatePassword"  class="absolute z-30 space-x-4 left-1/3 animate-pulse">
                <div class="flex items-center justify-center text-white bg-green-300 rounded-full w-36 h-36">loading..</div>
            </div>
            @endif
            <div class="flex items-center space-x-2">
                <x-jet-button wire:click="generatePassword" wire:target="generatePassword" wire:loading.attr="disabled" class="bg-green-400 hover:bg-green-700">
                    {{ __('Generate Password') }}
                </x-jet-button>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    {{--
                          <x-table.heading class="w-8 pr-0">
                          <x-input.checkbox wire:model="selectPage" />
                          </x-table.heading>
                    --}}

                    <x-table.heading >DEPARTMENT</x-table.heading>

                    <x-table.heading >Student ID</x-table.heading>

                    <x-table.heading >Name</x-table.heading>

                    <x-table.heading >LEVEL</x-table.heading>

                    <x-table.heading >Date Generated</x-table.heading>

                </x-slot>

                <x-slot name="body">
                    {{-- @if ($selectPage) --}}
                    <x-table.row class="bg-cool-gray-200" wire:key="row-message">
                        {{-- <x-table.cell colspan="6">
                            @unless ($selectAll)
                            <div>
                                <span>You have selected <strong>{{ $transactions->count() }}</strong> transactions, do you want to select all <strong>{{ $transactions->total() }}</strong>?</span>
                                <x-button.link wire:click="selectAll" class="ml-1 text-blue-600">Select All</x-button.link>
                            </div>
                            @else
                            <span>You are currently selecting all <strong>{{ $transactions->total() }}</strong> transactions.</span>
                            @endif
                        </x-table.cell> --}}
                    </x-table.row>
                    {{-- @endif --}}

                    @forelse ($students as $student)
                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $student->id }}">
                        <x-table.cell class="pr-0">
                            {{-- <x-input.checkbox wire:model="selected" value="{{ $student->department->dept_title }}" /> --}}
                            <span class="font-medium text-cool-gray-900"> {{ $student->department->dept_title }} </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="font-medium text-cool-gray-900"> {{ $student->student_id_number }} </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="font-medium text-cool-gray-900">{{ $student->fullname }}  </span>
                        </x-table.cell>

                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                        <x-table.cell>
                            <span class="font-medium text-cool-gray-900">{{ $student->level }}  </span>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $student->created_at }}
                        </x-table.cell>

                        {{-- <x-table.cell>
                            <x-button.link wire:click="generatePassword({{ $student->id }})">Generate Password</x-button.link>
                        </x-table.cell> --}}

                    </x-table.row>
                    @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="flex items-center justify-center space-x-2">
                                <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                                <span class="py-8 text-xl font-medium text-cool-gray-400">No transactions found...</span>
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

    <!-- Delete Transactions Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">Delete Transaction</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Delete</x-button.primary>
            </x-slot>
        </x-modal.confirmation>
    </form>

    <!-- Save Transaction Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit Transaction</x-slot>

            <x-slot name="content">
                <x-input.group for="title" label="Title" :error="$errors->first('editing.title')">
                    <x-input.text wire:model="editing.title" id="title" placeholder="Title" />
                </x-input.group>

                <x-input.group for="amount" label="Amount" :error="$errors->first('editing.amount')">
                    <x-input.money wire:model="editing.amount" id="amount" />
                </x-input.group>

                {{-- <x-input.group for="status" label="Status" :error="$errors->first('editing.status')">
                    <x-input.select wire:model="editing.status" id="status">
                        @foreach (App\Models\Transaction::STATUSES as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group> --}}

                <x-input.group for="date_for_editing" label="Date" :error="$errors->first('editing.date_for_editing')">
                    <x-input.date wire:model="editing.date_for_editing" id="date_for_editing" />
                </x-input.group>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>
