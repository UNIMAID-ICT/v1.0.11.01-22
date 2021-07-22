<div>
    <x-slot name="header">
        <h2 class="flex justify-between text-xl font-semibold leading-tight text-gray-800 pt-6 sm:pt-0">
            {{ __('Result Upload') }}
            {{-- <a class="p-2 font-sans text-sm text-white bg-blue-400 rounded-md shadow hover:bg-blue-500"
                href="{{ route('admin.users.index') }}">Back</a> --}}
        </h2>
        
        <h2 class="flex justify-between text-xl font-semibold leading-tight text-gray-800 pt-6 sm:pt-0">
            {{ $rowAdded}}
        </h2>
    </x-slot>
    <div class="flex items-center justify-between space-x-6 mx-2 sm:mx-0">
        @if($doneUpload)
            <x-button.secondary wire:click="$toggle('showModal')" class="flex items-center space-x-2"><x-icon.upload class="text-cool-gray-500"/> 
            <span>Import Result</span> 
            </x-button.secondary>
        @endif
        {{-- <div>Total Uploads {{$rowAdded}}</div> --}}
        <div></div>
        @if(!$doneUpload)
        <x-jet-button  wire:click.prevent="uploadRecord" wire:target="uploadRecord" wire:loading.attr="disabled" class="bg-green-400 hover:bg-green-700" >
            <x-icon.upload class="text-cool-gray-500 mr-2"/>{{ __('Upload Results') }}
        </x-jet-button>
        @endif
    </div>
    <div wire:loading wire:target="uploadRecord"  class="absolute z-30  space-x-4 left-1/3 animate-pulse">
        <div class="flex justify-center items-center bg-green-300 rounded-full w-36 h-36 text-white">Uploading Records.</div>                    
    </div>
    <x-modal.dialog wire:model="showModal">
            <x-slot name="title">Upload Result<div>Importing {{$rowUploading}}</div></x-slot>
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
                <div wire:loading wire:target="upload" class="absolute z-30  space-x-4 top-32 left-1/3 animate-pulse">
                    <div class="flex justify-center items-center bg-red-300 rounded-full w-36 h-36">Fetching Records.</div>                    
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

                     <x-input.group for="course_code" label="Course">
                        <x-input.select wire:model="fieldColumnMap.course_code" id="course_code" :error="$errors->first('fieldColumnMap.course_code')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="semester" label="Semester">
                        <x-input.select wire:model="fieldColumnMap.semester" id="semester" :error="$errors->first('fieldColumnMap.semester')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                
                    <x-input.group for="ca" label="Course Assement Score">
                        <x-input.select wire:model="fieldColumnMap.ca" id="ca" :error="$errors->first('fieldColumnMap.ca')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="exam" label="Exam Score">
                        <x-input.select wire:model="fieldColumnMap.exam" id="exam" :error="$errors->first('fieldColumnMap.exam')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="total" label="Total Score">
                        <x-input.select wire:model="fieldColumnMap.total" id="total" :error="$errors->first('fieldColumnMap.total')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group> 
               

                    <x-input.group for="remark" label="Remark">
                        <x-input.select wire:model="fieldColumnMap.remark" id="remark" :error="$errors->first('fieldColumnMap.remark')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                </div>
                @endif   
               
                 <div wire:loading wire:target="import" class="absolute z-30  space-x-4 top-32 left-72 animate-pulse">
                    <div class="flex justify-center items-center bg-red-300 rounded-full w-36 h-36">Uploading.</div>                    
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
                    <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['title'] ?? null" class="">s/no</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['student_id_number_number'] ?? null" class="">STUDENT ID</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('amount')" :direction="$sorts['Name'] ?? null">COURSE CODE</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('status')" :direction="$sorts['faculity'] ?? null">SEMESTER</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">REMARK</x-table.heading>
                   
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
                                {{ $result['course_code'] }}
                                </span>
                            </x-table.cell>

                            <x-table.cell>
                                {{ $result['semester'] }}                             
                            </x-table.cell>

                            <x-table.cell>
                                {{ $result['remark'] }}                             
                            </x-table.cell>

                        {{-- <x-table.cell>
                            <div class="flex justify-between">
                                <x-button.link wire:click="" class="bg-blue-500 text-white py-1 px-2 rounded-md">Edit</x-button.link>
                                <x-button.link wire:click="removeFee({{$fee->id}})" class="bg-red-500 text-white py-1 px-2 rounded-md" >Delete</x-button.link>
                            </div>
                            </x-table.cell>
                         --}}

                    </x-table.row>
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
{{-- end --}}
<x-notification />
</div>
