<div class="space-y-8 divide-y divide-gray-200 mx-3">
    <x-slot name="header">
        <h2 class="flex justify-between text-3xl font-semibold leading-tight text-gray-800 pt-6 sm:pt-0 uppercase">
            {{ $faculities->school_title }}
            {{-- <a class="p-2 font-sans text-sm text-white bg-blue-400 rounded-md shadow hover:bg-blue-500"
                href="{{ route('admin.users.index') }}">Back</a> --}}
        </h2>
    </x-slot>
    <div class="my-6">
        <h2 class="flex justify-between text-xl font-semibold leading-tight text-gray-800 pt-6 sm:pt-0">
            {{ __('COURSE MANAGER') }}            
        </h2>
    </div>
    {{-- Faculity --}}
    <!--
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            
            <label for="blood_group" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Faculty/College
            </label>
            
            <div x-data="{ show: false }" class="mt-1 space-y-3 sm:mt-0 sm:col-span-2">
            
            <x-input.select  class="w-full" wire:model.debounce.10ms="school_id" id="school_id">
                <div class="px-4 overflow-y-auto">
                <option>Select School</option>
                {{-- @foreach ($faculities as $school)
                        <option value="{{$school->id}}" class="cursor-pointer" >
                        {{$school->school_title}} </option>
                @endforeach --}}
                </div>
            </x-input.select>
            <div class="flex space-x-3">                           
                <x-jet-button wire:loading.attr="disabled" wire:target="update_school, fetch_school, open_add_new_school_model" wire:click="open_add_new_school_model" >
                    {{ __('+') }}
                </x-jet-button>    

                @if(($school_id != 'Select School') && ($school_id != '') )
                <x-jet-button @click='show = true' class="bg-red-200" wire:loading.attr="disabled" wire:target="update_school, fetch_school, open_add_new_school_model" wire:click="fetch_school" >
                    {{ __('Edit') }}
                </x-jet-button>  
                @endif              
            </div>
                {{-- EDIT SCHOOL SECTION --}}
                <div x-show="show" @click.away="show = false">
                    @if($school_data)
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    School Title
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full uppercase" type="text" wire:model.defer="school_title" id="School Title" placeholder="Department Title"  />
                            <x-jet-input-error for="school_title" class="mt-2" />
                            </div>
                            <div class="flex space-x-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    School Code
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full uppercase" type="text" wire:model.defer="school_code" id="School Code" placeholder="School code"  />
                            <x-jet-input-error for="school_code" class="mt-2" />
                            </div>
                            <div class="flex space-x-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    School Number
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full uppercase" type="text" wire:model.defer="school_no" placeholder="School Number"  />
                                <x-jet-input-error for="school_no" class="mt-2" />
                            </div>
                            
                            
                            <div class="flex space-x-1">
                                <label for="school_no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    School Type
                                </label>
                                <span class="text-red-500">*</span>
                            </div>                        
                        
                            <div class="flex justify-between">
                                    
                                <x-jet-button class="bg-green-400" wire:loading.attr="disabled" wire:target="updateSchool, fetch_department, done" wire:click="updateSchool" >
                                    {{ __('Update') }}
                                </x-jet-button>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
        </div> 
    -->

    {{-- Department --}}
   
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="blood_group" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Departments
            </label>
            
            <div x-data="{ show: false }"  class="mt-1 space-y-3 sm:mt-0 sm:col-span-2">
            <x-input.select   class="w-full" wire:model="department_id" id="department_id">
                <div class="px-4 overflow-y-auto">
                {{-- @if($schools)  --}}
                    <option>SELECT DEPARTMENT</option>            
                    {{-- @forelse ($schools as $school) --}}
                        @forelse ($departments as $department)
                            {{-- @if($dept->id == $department->id) --}}
                            <option value="{{$department->id}}" class="cursor-pointer">
                                {{$department->dept_title}} 
                            </option> 
                            {{-- @endif   --}}
                        @empty                 
                        @endforelse
                    {{-- @empty
                    @endforelse --}}
                {{-- @endif  --}}
                </div>
            </x-input.select>
            <div class="flex space-x-3">                           
                <x-jet-button wire:loading.attr="disabled" wire:target="fetch_department, open_add_new_department" wire:click="$toggle('open_add_new_department')" >
                    {{ __('+') }}
                </x-jet-button>    

                {{-- @if(($depts_id != 'Select Department') && ($department_id != '') ) --}}
                <x-jet-button @click='show = true' class="bg-red-200" wire:loading.attr="disabled" wire:target="update_department, fetch_department, open_add_new_department" wire:click="fetch_department" >
                    {{ __('Edit') }}
                </x-jet-button>  
                {{-- @endif --}}
            </div>
            {{-- EDIT DEPARTMENT SECTION --}}
                <div x-show="show" @click.away="show = false">
                    @if($department_data)
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Department Title
                                </label>

                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full uppercase" type="text" wire:model.defer="dept_title" id="Department Title" placeholder="Department Title"  />
                            <x-jet-input-error for="dept_title" class="mt-2" />
                            </div>

                            {{-- <div class="flex space-x-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Department Code
                                </label>
                                <span class="text-red-500">*</span>
                            </div> --}}

                            {{-- <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full uppercase" type="text" wire:model.defer="dept_code" id="Department Code" placeholder="Department code"  />
                            <x-jet-input-error for="dept_code" class="mt-2" />
                            </div> --}}
                            
                            <div class="flex space-x-1">
                                <label for="dept_no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Department Number
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input wire:keydown.enter="update_department" wire:model.defer="dept_no" class="w-full uppercase" type="text"  id="Department Number" placeholder="Department Number"  />
                            <x-jet-input-error for="dept_no" class="mt-2" />
                            </div>
                            <div class="flex justify-between">                                                           
                                <x-jet-button wire:click="update_department"  wire:loading.attr="disabled"  wire:target="update_department, fetch_department, open_add_new_department"  class="bg-green-400">
                                    {{ __('Update Department') }}
                                </x-jet-button>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
        </div> 
    

    {{-- Program --}}
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="blood_group" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        Programmes 
        </label>
        
        <div x-data class="mt-1 space-y-3 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model.debounce.10ms="program_id" id="program_id">
                <div class="px-4 overflow-y-auto">
                @if($programs) 
                    <option>SELECT  PROGRAMME</option>            
                    @forelse ($programs as $program)
                        <option value="{{$program->id}}" class="cursor-pointer">
                            {{$program->pro_title}} 
                        </option>
                      @empty               
                    @endforelse
                @endif
                </div>
            </x-input.select>
            
                <div class="flex space-x-3">                    
                    <x-jet-button wire:loading.attr="disabled" wire:target="open_add_new_program" wire:click="$toggle('open_add_new_program')" >
                        {{ __('+') }}
                    </x-jet-button>                   
                    {{-- @if(($program_id != 'Select Program') && ($program_id != '') ) --}}
                        <x-jet-button @click='show = true' class="bg-red-200" wire:click="fetch_program" wire:loading.attr="disabled" wire:target="open_add_new_program, update_program, fetch_program, "  >
                            {{ __('Edit') }}
                        </x-jet-button>  
                    {{-- @endif                  --}}
                </div>  
           
                {{-- EDIT Program SECTION --}}
                <div x-show="show" @click.away="show = false">
                    @if($program_data)
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="flex space-x-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Program Title
                                </label>

                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full uppercase" type="text" wire:model.defer="pro_title" id="Program Title" placeholder="Program Title"  />
                            <x-jet-input-error for="pro_code" class="mt-2" />
                            </div>
                            <div class="flex space-x-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Programme Code
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input wire:keydown.enter='update_program' class="w-full uppercase" type="text" wire:model.defer="pro_code" id="Program Code" placeholder="Program code"  />
                            <x-jet-input-error for="pro_code" class="mt-2" />
                            </div>


                            {{-- <div class="flex space-x-1">
                                <label for="pro_no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Programme Number
                                </label>
                                <span class="text-red-500">*</span>
                            </div> --}}
                            {{-- <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input  wire:keydown.enter='update_program' class="w-full uppercase" type="text" wire:model.defer="pro_no" id="Program Number" placeholder="Program Number"  />
                            <x-jet-input-error for="pro_no" class="mt-2" />
                            </div> --}}


                            <div class="flex justify-between">
                                {{-- <x-jet-button class="bg-blue-400" wire:click="" wire:loading.attr="disabled" wire:target="update_program, fetch_program, open_add_new_department"  >
                                    {{ __('Cancel') }}
                                </x-jet-button>                            --}}
                                <x-jet-button class="bg-green-400" wire:click="update_program" wire:loading.attr="disabled" wire:target="update_program, fetch_program, open_add_new_department"  >
                                    {{ __('Update Program') }}
                                </x-jet-button>

                            </div>
                        </div>
                    @endif       
                </div>
        </div>
    </div>

    {{-- Courses --}}
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="middle_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        Courses
        </label>
        <div class="mt-1 space-y-3 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model.debounce.10ms="course_id" id="course_id">
                <div class="px-4 overflow-y-auto">
                @if(!is_null($programCourse)) 
                    <option>SELECT COURSE</option>            
                    @foreach ($programCourse as $course)
                        {{-- @foreach ($program->courses as $course) --}}
                            <option value="{{$course->id}}" class="cursor-pointer">
                            {{$course->course_title}} </option>                
                        {{-- @endforeach                 --}}
                    @endforeach
                @endif
                </div>
            </x-input.select>
        
            <div>                           
                <x-jet-button wire:loading.attr="disabled" wire:target="open_add_new_course" wire:click="$toggle('open_add_new_course')" >
                    {{ __('+') }}
                </x-jet-button> 
            </div>
        </div>        
    </div>
    @include('modelDialog.add_new_fac_dept_prog_course')  
<x-notification/>
</div>
