<div class="mx-3 mt-20 mb-6 sm:mx-20">
    <div class="flex items-center space-x-6">
        <x-button.secondary wire:click="$toggle('showModal')" class="flex items-center space-x-2"><x-icon.upload class="text-cool-gray-500"/>
        <span>Import Student(s)</span>
        </x-button.secondary>
        <div>Total Upload {{$rowAdded}}</div>
    </div>


    <x-jet-dialog-modal  wire:model="showModal">
        <x-slot name="title">IMPORT STUDENT <div>Importing {{$rowUploading}}</div></x-slot>
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


                <x-input.group for="department_id" label="department_id">
                    <x-input.select wire:model="fieldColumnMap.department_id" id="department_id" :error="$errors->first('fieldColumnMap.department_id')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="student_id_number" label="student_id_number">
                    <x-input.select wire:model="fieldColumnMap.student_id_number" id="student_id_number" :error="$errors->first('fieldColumnMap.student_id_number')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="title" label="title">
                    <x-input.select wire:model="fieldColumnMap.title" id="title" :error="$errors->first('fieldColumnMap.title')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="fullname" label="fullname">
                    <x-input.select wire:model="fieldColumnMap.fullname" id="fullname" :error="$errors->first('fieldColumnMap.fullname')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="gender" label="gender">
                    <x-input.select wire:model="fieldColumnMap.gender" id="gender" :error="$errors->first('fieldColumnMap.gender')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="country" label="country">
                    <x-input.select wire:model="fieldColumnMap.country" id="country" :error="$errors->first('fieldColumnMap.country')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="state" label="state">
                    <x-input.select wire:model="fieldColumnMap.state" id="state" :error="$errors->first('fieldColumnMap.state')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="lga" label="lga">
                    <x-input.select wire:model="fieldColumnMap.lga" id="lga" :error="$errors->first('fieldColumnMap.lga')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>

                {{-- <x-input.group for="marital_stutus" label="marital_stutus">
                    <x-input.select wire:model="fieldColumnMap.marital_stutus" id="marital_stutus" :error="$errors->first('fieldColumnMap.marital_stutus')">
                        <option value="" disabled>Select Column...</option>
                        @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                        @endforeach
                    </x-input.select>
                    </x-input.group>
                    <x-input.group for="telephone" label="telephone">
                        <x-input.select wire:model="fieldColumnMap.telephone" id="telephone" :error="$errors->first('fieldColumnMap.telephone')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="email" label="email">
                        <x-input.select wire:model="fieldColumnMap.email" id="email" :error="$errors->first('fieldColumnMap.email')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="photo" label="photo">
                        <x-input.select wire:model="fieldColumnMap.photo" id="photo" :error="$errors->first('fieldColumnMap.photo')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="nin" label="nin">
                        <x-input.select wire:model="fieldColumnMap.nin" id="nin" :error="$errors->first('fieldColumnMap.nin')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="date_of_birth" label="date_of_birth">
                        <x-input.select wire:model="fieldColumnMap.date_of_birth" id="date_of_birth" :error="$errors->first('fieldColumnMap.date_of_birth')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="address" label="address">
                        <x-input.select wire:model="fieldColumnMap.address" id="address" :error="$errors->first('fieldColumnMap.address')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="blood_group" label="blood_group">
                        <x-input.select wire:model="fieldColumnMap.blood_group" id="blood_group" :error="$errors->first('fieldColumnMap.blood_group')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="disability" label="disability">
                        <x-input.select wire:model="fieldColumnMap.disability" id="disability" :error="$errors->first('fieldColumnMap.disability')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="medical_condition" label="medical_condition">
                        <x-input.select wire:model="fieldColumnMap.medical_condition" id="medical_condition" :error="$errors->first('fieldColumnMap.medical_condition')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="access_token" label="access_token">
                        <x-input.select wire:model="fieldColumnMap.access_token" id="access_token" :error="$errors->first('fieldColumnMap.access_token')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group for="payment_token" label="payment_token">
                        <x-input.select wire:model="fieldColumnMap.payment_token" id="payment_token" :error="$errors->first('fieldColumnMap.payment_token')">
                            <option value="" disabled>Select Column...</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                --}}

                <x-input.group for="level" label="Level">
                    <x-input.select wire:model="fieldColumnMap.level" id="level" :error="$errors->first('fieldColumnMap.level')">
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
    </x-jet-dialog-modal>

    @livewire('admin.generate-student-password')
</div>
