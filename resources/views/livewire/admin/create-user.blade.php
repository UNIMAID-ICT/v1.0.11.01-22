<div>
    <x-slot name="header">
        <h2 class="flex justify-between pt-6 text-xl font-semibold leading-tight text-gray-800 sm:pt-0">
            {{ __('Create User') }}
            {{ $user_type }}
            <x-notification />
            {{-- <a class="p-2 font-sans text-sm text-white bg-blue-400 rounded-md shadow hover:bg-blue-500"
                href="{{ route('admin.users.index') }}">Back</a> --}}
        </h2>
    </x-slot>
    <div class="mx-3 mb-6 sm:mx-20">

        <div x-data="{ show: {{ $departments }} }" class="pt-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div>
                <div class="mt-4">
                    <x-jet-label for="user_type" value="{{ __('User Type') }}" />
                    <div x-data class="mt-1 space-y-3 sm:mt-0 sm:col-span-2">
                        <x-input.select  class="w-full" wire:model.debounce.10ms="user_type" id="user_type" required>
                            <div class="px-4 overflow-y-auto">
                            <option value="">SELECT USER</option>
                            @foreach (App\Models\Assets::USER_TYPE as $value => $label)
                                    <option class="cursor-pointer" >
                                    {{$label}} </option>
                            @endforeach
                            </div>
                        </x-input.select>
                    <div>
                </div>
            </div>
            <div class="">
                <div>
                    <x-jet-label for="name" value="{{ __('User Name') }}" />
                    <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" wire:model="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    @if(($user_type === "FACULTY REPRESENTATIVE") || $user_type === "DEAN")
                        <div class="mt-4">
                            <x-jet-label for="school_id" value="{{ __('User Faculty') }}" />
                            <div x-data class="mt-1 space-y-3 sm:mt-0 sm:col-span-2">
                                    <x-input.select  class="w-full" wire:model.debounce.10ms="school_id" id="school_id" required>
                                        <div class="px-4 overflow-y-auto">
                                            <option value="">SELECT FACULTY</option>
                                            @foreach (App\Models\School::all() as $school)
                                                    <option value="{{$school->id}}" class="cursor-pointer" >
                                                    {{$school->school_title}} </option>
                                            @endforeach
                                        </div>
                                    </x-input.select>
                            </div>
                        </div>
                    @endif
                </div>

                <div x-show="show">
                    @if(($user_type == "HOD") || ($user_type == "DEPARTMENT CORDINATOR"))
                        <div class="mt-4">
                            <x-jet-label for="department" value="{{ __('User Department') }}" />
                            <div x-bind:class="! show ? 'hidden' : ''" class="mt-1 space-y-3 sm:mt-0 sm:col-span-2">
                                <x-input.select  class="w-full" wire:model.debounce.10ms="department" id="department" required>
                                    <div class="px-4 overflow-y-auto">
                                        <option value="" >SELECT DEPARTMENT</option>
                                        @forelse (App\Models\Department::all() as $department)
                                                <option value="{{$department->id}}" class="cursor-pointer" >
                                                {{$department->dept_title}} </option>
                                            @empty
                                        @endforelse
                                    </div>
                                </x-input.select>
                            </div>
                        </div>
                        @endif
                </div>


                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block w-full mt-1" type="password" wire:model="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" wire:model="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <span class="mt-1 ">Roles:</span>
                <div class="flex flex-wrap items-center p-3 mt-1 space-x-3 space-y-4 border-2">
                    @foreach($roles as $role)
                    <div class="flex items-center space-x-3 "  wire:key="row-{{ $role->id }}">
                    {{-- && $role->name != 'Chief Admin' && $role->name != 'Vice Chancellor' && $role->name != 'Registrar' && $role->name != 'Bursar' && $role->name != 'Course System' && $role->name != 'Dean Student Affair' --}}
                    {{-- && $role->name != 'Dean' --}}
                    @if($role->name != 'Student' )

                        <x-input.checkbox class="w-8 h-8" wire:change="getRole({{ $role->id }})"  wire:model.defer="role" value="{{ $role->id}}">
                        </x-input.checkbox>
                        <x-jet-label for="{{ $role->name }}" value="{{ $role->name }}" />

                    @endif

                    </div>
                    @endforeach
                </div>


                {{-- @if($user_role == 'Department Coordinator') --}}
                {{--
                    <div class="flex flex-wrap p-3 mt-4 space-x-6 space-y-4 border-2">
                    <span>Semester Role</span>

                        <x-input.radio wire:change="$set('user_role', 'First Semester')" name="user_role" value="">
                        </x-input.radio>
                        <x-jet-label for="" value="First Semester" />

                        <x-input.radio wire:change="$set('user_role', 'Second Semester')" name="user_role"   value="">
                        </x-input.radio>
                        <x-jet-label for="" value="Second Semester" />
                    </div>
                --}}

                @if($user_role == 11)
                <div class="mt-4">
                    <x-jet-label for="cor_level" value="{{ __('LEVEL') }}" />
                    <div x-data class="mt-1 space-y-3 sm:mt-1 sm:col-span-2">
                        <x-input.select  class="w-full" wire:model.debounce.10ms="cor_level" id="cor_level" required>
                            <div class="px-4 overflow-y-auto">
                            <option value="">SELECT LEVEL</option>
                            @foreach (App\Models\Assets::LEVEL as $label)
                                    <option value="{{$label}}" class="cursor-pointer" >
                                    {{$label}} </option>
                            @endforeach
                            </div>
                        </x-input.select>
                    </div>
                </div>
                @endif

                <div class="flex items-center justify-end pb-4 mt-4">
                    <x-notification />
                    {{-- @if($user_role) --}}
                    <x-jet-button wire:click="save_new_user"  wire:target="save_new_user" wire:loading.attr="disabled" class="bg-green-400 hover:bg-green-700">
                      {{ __('Create') }}
                    </x-jet-button>
                    {{-- @endif --}}
                </div>

                {{-- @if($role->name === 'Dean')  data-toggle="modal" data-target="#open_fetch_school_faculty_modal"--}}
                {{-- @include('modelDialog.fetch_school') --}}
            </div>
            <x-jet-validation-errors class="mb-4" />
        </div>
        {{-- @include('modelDialog.change_password') --}}
    </div>
</div>
