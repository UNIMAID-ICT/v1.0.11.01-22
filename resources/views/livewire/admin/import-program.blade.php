<div class="mx-3 mt-20 mb-6">

    <div class="flex items-center space-x-6">
        <x-button.secondary wire:click="$toggle('showModal')" class="flex items-center space-x-2"><x-icon.upload class="text-cool-gray-500"/>
        <span>Import Programmes</span>
        </x-button.secondary>
        <div>Total Upload Programmes {{$rowAdded}}</div>
    </div>

    <div class="my-10">
        @livewire('admin-display.display-programme')
    </div>

    <x-modal.dialog wire:model="showModal">
        <x-slot name="title">IMPORT PROGRAMME <div>Importing {{$rowUploading}}</div></x-slot>
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

                <x-input.group for="department_id" label="Department No" :error="$errors->first('fieldColumnMap.department_id')">
                    <x-input.select wire:model="fieldColumnMap.department_id">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>

                <x-input.group for="pro_title" label="Programme_Title">
                    <x-input.select wire:model="fieldColumnMap.pro_title" id="pro_title" :error="$errors->first('fieldColumnMap.pro_title')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>

                <x-input.group for="pro_code" label="Programme_Code">
                    <x-input.select wire:model="fieldColumnMap.pro_code" id="pro_code" :error="$errors->first('fieldColumnMap.pro_code')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>

                {{-- <x-input.group for="pro_no" label="Programme_No">
                    <x-input.select wire:model="fieldColumnMap.pro_no" id="pro_no" :error="$errors->first('fieldColumnMap.pro_no')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group> --}}

            </div>
            @endif

            <div>
            @if($start)
                <div class="absolute z-30 flex space-x-4 top-56 left-80 animate-pulse">
                    <div class="bg-blue-400 rounded-full w-36 h-36">Uploading Programmes.....</div>
                </div>
            @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            {{-- <div>
            @if($done)
                <div>
                    <x-button.secondary wire:click="$set('showModal', false)">Cancel</x-button.secondary>
                    <x-button.primary type="submit" wire:target='import' wire.loading.attr="disabled">Import</x-button.primary>
                </div>
            @endif
            </div> --}}
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

</div>


