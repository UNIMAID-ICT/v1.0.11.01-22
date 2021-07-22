<div class="mx-3 mt-20 mb-6">
    <div class="flex items-center space-x-6">
        <x-button.secondary wire:click="$toggle('showModal')" class="flex items-center space-x-2"><x-icon.upload class="text-cool-gray-500"/>
        <span>Import Courses</span>
        </x-button.secondary>
        <div>Total Upload {{$rowAdded}}</div>
    </div>
    <div class="my-10">
        @livewire('admin-display.display-course')
    </div>
    <form wire:submit.prevent="import">
        <x-modal.dialog wire:model="showModal">
            <x-slot name="title">IMPORT COURSES</x-slot>
            <x-slot name="content">

                @unless ($upload)
                <div class="flex flex-col items-center justify-center py-12 ">
                    <div class="flex items-center space-x-2 text-xl">
                        <x-icon.upload class="w-8 h-8 text-cool-gray-400" />
                        <x-input.file-upload wire:model="upload" id="upload"><span class="font-bold text-cool-gray-500">CSV File</span></x-input.file-upload>
                    </div>
                    @error('upload') <div class="mt-3 text-sm text-red-500">{{ $message }}</div> @enderror
                </div>
                @else
                <div>

                    <x-input.group for="program_id" label="Programme Id" :error="$errors->first('fieldColumnMap.program_id')">
                        <x-input.select wire:model="fieldColumnMap.program_id_id" id="program_id">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="course_code" label="Course Code">
                        <x-input.select wire:model="fieldColumnMap.course_code" id="course_code" :error="$errors->first('fieldColumnMap.course_code')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="course_title" label="Course Title" :error="$errors->first('fieldColumnMap.course_title')">
                        <x-input.select wire:model="fieldColumnMap.course_title">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="units" label="Units">
                        <x-input.select wire:model="fieldColumnMap.units" id="units" :error="$errors->first('fieldColumnMap.units')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    {{-- <x-input.group for="level" label="Level">
                        <x-input.select wire:model="fieldColumnMap.level" id="level" :error="$errors->first('fieldColumnMap.level')">
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
                    </x-input.group> --}}

                    <x-input.group for="mode" label="mode">
                        <x-input.select wire:model="fieldColumnMap.mode" id="mode" :error="$errors->first('fieldColumnMap.mode')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="elective" label="elective">
                        <x-input.select wire:model="fieldColumnMap.elective" id="elective" :error="$errors->first('fieldColumnMap.elective')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="pre_requisite" label="pre_requisite">
                        <x-input.select wire:model="fieldColumnMap.pre_requisite" id="pre_requisite" :error="$errors->first('fieldColumnMap.pre_requisite')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                </div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <div>
               @if($done)
                <div>
                    <x-jet-button wire:click.prevent="$set('showModal', false)"
                     class="bg-green-400 hover:bg-blue-700" wire:loading.attr="disabled"
                     wire:target="import"  >
                            {{ __('cancle') }}
                    </x-jet-button>
                    <x-jet-button wire:click.prevent="import"
                     class="bg-green-400 hover:bg-green-700" wire:target="import, showModal" wire:loading.attr="disabled"
                       >
                            {{ __('Save') }}
                    </x-jet-button>
                </div>
                @endif
           </div>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>
