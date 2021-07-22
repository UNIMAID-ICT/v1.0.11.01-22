<div class="mx-3 mt-20 mb-6">
    <x-slot name="header">
        <h2 class="flex justify-between pt-6 text-xl font-semibold leading-tight text-gray-800 sm:pt-0">
            {{ __('Status Upload') }}
            {{-- <a class="p-2 font-sans text-sm text-white bg-blue-400 rounded-md shadow hover:bg-blue-500"
                href="{{ route('admin.users.index') }}">Back</a> --}}
        </h2>

        <h2 class="flex justify-between pt-6 text-xl font-semibold leading-tight text-gray-800 sm:pt-0">
            {{ $rowAdded}}
        </h2>
    </x-slot>
    <div class="flex items-center justify-between mx-2 space-x-6 sm:mx-0">
        @if($doneUpload)
            <x-button.secondary wire:click="$toggle('showModal')" class="flex items-center space-x-2"><x-icon.upload class="text-cool-gray-500"/>
            <span>Import Status</span>
            </x-button.secondary>
        @endif
        {{-- <div>Total Uploads {{$rowAdded}}</div> --}}
        <div></div>
        @if(!$doneUpload)
        <x-jet-button  wire:click.prevent="uploadRecord" wire:target="uploadRecord" wire:loading.attr="disabled" class="bg-green-400 hover:bg-green-700" >
            <x-icon.upload class="mr-2 text-cool-gray-500"/>{{ __('Upload Status') }}
        </x-jet-button>
        @endif
    </div>
    <div wire:loading wire:target="uploadRecord"  class="absolute z-30 space-x-4 left-1/3 animate-pulse">
        <div class="flex items-center justify-center text-white bg-green-300 rounded-full w-36 h-36">Uploading Records.</div>
    </div>
    <x-modal.dialog wire:model="showModal">
            <x-slot name="title">Upload Status<div>Importing {{$rowUploading}}</div></x-slot>
            <x-slot name="content">

                @unless ($upload)
                <div class="flex flex-col items-center justify-center py-12 ">
                    <div class="flex items-center space-x-2 text-xl">
                        {{-- <x-icon.upload class="w-8 h-8 text-cool-gray-400" /> --}}
                        <x-input.result-upload wire:model.prevent="upload" wire:target='upload, done' wire:loading.attr="disabled" wire:loading.remove id="upload">
                        <span class="font-bold text-cool-gray-500">CSV File</span>
                        </x-input.result-upload>
                    </div>
                    @error('upload') <div class="mt-3 text-sm text-red-500">{{ $message }}</div> @enderror
                </div>
                {{--  --}}
                <div wire:loading wire:target="upload" class="absolute z-30 space-x-4 top-32 left-1/3 animate-pulse">
                    <div class="flex items-center justify-center bg-red-300 rounded-full w-36 h-36">Fetching Records.</div>
                </div>

                @else
                <div>

                    {{-- <x-input.group for="academic_id" label="Academic Session" :error="$errors->first('fieldColumnMap.academic_id')">
                        <x-input.select wire:model="fieldColumnMap.academic_id">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group> --}}

                    <x-input.group for="student_id_number" label="Student">
                        <x-input.select wire:model="fieldColumnMap.student_id_number" id="student_id_number" :error="$errors->first('fieldColumnMap.student_id_number')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                     <x-input.group for="cum_unit" label="Cummlative Units">
                        <x-input.select wire:model="fieldColumnMap.cum_unit" id="cum_unit" :error="$errors->first('fieldColumnMap.cum_unit')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="cum_prod" label="Cummulative Product">
                        <x-input.select wire:model="fieldColumnMap.cum_prod" id="cum_prod" :error="$errors->first('fieldColumnMap.cum_prod')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>



                    <x-input.group for="gpa" label="GPA">
                        <x-input.select wire:model="fieldColumnMap.gpa" id="gpa" :error="$errors->first('fieldColumnMap.gpa')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="cgpa" label="CGPA">
                        <x-input.select wire:model="fieldColumnMap.cgpa" id="cgpa" :error="$errors->first('fieldColumnMap.cgpa')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="student_status" label="Student Status">
                        <x-input.select wire:model="fieldColumnMap.student_status" id="student_status" :error="$errors->first('fieldColumnMap.student_status')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>


                    <x-input.group for="no_carry_over" label="Carry Over">
                        <x-input.select wire:model="fieldColumnMap.no_carry_over" id="no_carry_over" :error="$errors->first('fieldColumnMap.no_carry_over')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                </div>
                @endif

                 <div wire:loading wire:target="import" class="absolute z-30 space-x-4 top-32 left-72 animate-pulse">
                    <div class="flex items-center justify-center bg-red-300 rounded-full w-36 h-36">Uploading.</div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <div>
                    <x-jet-button wire:click.prevent="done" wire:target="done, import" wire:loading.attr="disabled"
                         class="bg-green-400" >
                            {{ __('cancle') }}
                    </x-jet-button>
                 @if($done)
                    <x-jet-button wire:click.prevent="import" class="bg-green-400 hover:bg-green-700"
                         wire:target="import, done" wire:loading.attr="disabled">
                            {{ __('Import') }}
                    </x-jet-button>
                @endif
                </div>
            </x-slot>
    </x-modal.dialog>

{{-- <div class="py-5 mx-3">
  <div class="flex justify-end">
    <x-jet-button wire:click.prevent="saveFee" wire:loading.attr="disabled" wire:target="saveFee" >
        {{ __('Save') }}
    </x-jet-button>
   </div>
</div> --}}
{{-- Table --}}
<div class="my-10">
            <!-- Transactions Table -->
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable multi-column :direction="$sorts['title'] ?? null" class="">s/no</x-table.heading>
                    <x-table.heading sortable multi-column :direction="$sorts['student_id_number_number'] ?? null" class="">STUDENT ID</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('amount')" :direction="$sorts['Name'] ?? null">Cummulative Unit</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('status')" :direction="$sorts['faculity'] ?? null">Cummulative Product</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">GPA</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">CGPA</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">STATUS</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">NO. CARRY-OVER</x-table.heading>

                </x-slot>

                <x-slot name="body">
                    {{-- wire:key="row-{{ $result->id }}" --}}
                    @forelse ($imported as $result)
                    <x-table.row wire:loading.class.delay="opacity-50" >


                        <x-table.cell>
                            <span href="#" class="inline-flex space-x-2 text-sm leading-5 truncate">
                                {{-- <x-icon.cash class="text-cool-gray-400"/> --}}

                                <p class="truncate text-cool-gray-600">
                                    {{ $loop->iteration }}
                                </p>
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="font-medium text-cool-gray-900"> {{ $result['student_id_number'] }} </span>
                        </x-table.cell>

                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                            <x-table.cell>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                {{ $result['cum_unit'] }}
                                </span>
                            </x-table.cell>

                            <x-table.cell>
                                {{ $result['cum_prod'] }}
                            </x-table.cell>

                            <x-table.cell>
                                {{ $result['gpa'] }}
                            </x-table.cell>

                            <x-table.cell>
                                {{ $result['cgpa'] }}
                            </x-table.cell>

                            <x-table.cell>
                                {{ $result['student_status'] }}
                            </x-table.cell>
                            <x-table.cell>
                                {{ $result['no_carry_over'] }}
                            </x-table.cell>

                        {{-- <x-table.cell>
                            <div class="flex justify-between">
                                <x-button.link wire:click="" class="px-2 py-1 text-white bg-blue-500 rounded-md">Edit</x-button.link>
                                <x-button.link wire:click="removeFee({{$fee->id}})" class="px-2 py-1 text-white bg-red-500 rounded-md" >Delete</x-button.link>
                            </div>
                            </x-table.cell>
                         --}}

                    </x-table.row>
                    @empty

                        @foreach($missingstdIds as $missing)
                        <x-table.row>
                            <x-table.cell>

                            </x-table.cell>

                            <x-table.cell colspan="4">
                                {{ $missing }}
                            </x-table.cell>
                        </x-table.row>
                        @endforeach

                    @endforelse
                </x-slot>
            </x-table>

            <div>
                {{-- {{ $students->links() }} --}}
            </div>
        </div>
</div>
{{-- end --}}
<x-notification />
</div>

