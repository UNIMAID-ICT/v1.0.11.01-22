        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Title
            </label>
            {{-- <span class="text-red-500">*</span> --}}
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
          
          <x-jet-input  type="text"  wire:model.defer="title" class="w-full uppercase" id="title" placeholder="title"  />
          <x-jet-input-error for="title" class="mt-2" />
          </div>
        </div>

        
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="fullname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Name 
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  type="text" wire:model.defer="fullname"  class="w-full uppercase " id="fullname" placeholder="Full Name"  />
            
          </div>
        </div>

        {{-- 
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="middlename" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Middle name
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <x-jet-input  type="text"  wire:model.defer="middlename" class="w-full uppercase" id="middlename" placeholder="middle Name"  />
            </div>          
          </div>
          
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
              <label for="surename" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Surename 
              </label>
              <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <x-jet-input  type="text"  wire:model.defer="surname" class="w-full uppercase" id="surname" placeholder="Surname"  />
            
            </div>
          </div> 
        --}}

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="gender"  class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Gender
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
              <x-input.select wire:model="gender"  class="w-full" id="gender">
                  <div class="px-4 overflow-y-auto">
                      <option>Select Gender</option>
                      @foreach (App\Models\Assets::GENDER as $value => $label)
                          
                              <option class="cursor-pointer">
                              {{$value}} </option>
                         
                      @endforeach
                  </div>
              </x-input.select>
          {{-- <x-jet-input  type="text"  wire:model.defer="gender" class="w-full uppercase" id="gender" placeholder="gender"  />           --}}
          
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Date of Birth 
            </label>
            <span class="text-red-500">*</span>
          </div>
          {{-- readonly --}}
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  wire:model.defer="date_of_birth"  type="date"  class="w-full uppercase" id="date_of_birth" placeholder="last Name"  />
          
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="telephone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              National Identification Number
            </label>
            {{-- <span class="text-red-500">*</span> --}}
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input class="w-full uppercase" type="text" wire:model.defer="nin" id="nin" placeholder="nin"  />
          </div>
          
        </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="telephone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Telephone
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input wire:model.debounce.300ms="telephone" wire:target="saveStaff, reset" wire:loading.attr="disabled" maxlength="11" class="w-full uppercase" type="text" id="telephone" placeholder="telephone"  />
          
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
         <div class="flex space-x-1">
            <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Email
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input wire:model.debounce.300ms="email" wire:target="saveStaff, reset" wire:loading.attr="disabled" id="email" class="w-full uppercase" type="text" placeholder="email"  />
          
          </div>
        </div>

        <!-- <div x-data="{ open: true }" class="space-y-6">
              {{-- 
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <div class="flex space-x-1">
                <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Citizenship
                </label>
                <span class="text-red-500">*</span>
                </div>
                <div @click="!open" class="mt-1 sm:mt-0 sm:col-span-2">
                Are you a Nigerian Citizen ?
                <div class="flex space-x-6">
                    <div>
                        Yes:<x-input.checkbox wire:model.debounce.1ms="citizenship"  name="citizenship" @click="open = !open" class="w-6 h-6" />
                    </div>                    
                </div>
                <x-jet-input-error for="citizenship" class="mt-2" />
                </div>
            </div> --}}
            
            <div  class="space-y-6">

            <div  class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <div class="flex space-x-1">
                    <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Country
                    </label>
                    <span class="text-red-500">*</span>
                    </div>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input.select wire:model="country"  class="w-full" id="country">
                        <div class="px-4 overflow-y-auto">
                            <option>Select Country</option>
                        @foreach (App\Models\Assets::COUNTRY as $value => $label)
                                <option class="cursor-pointer" >
                                {{$label}} </option>
                        @endforeach
                        </div>
                    </x-input.select>
                    <x-jet-input-error for="country" class="mt-2" /> 
                    </div>
            </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <div class="flex space-x-1">
                    <label for="state" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        State
                    </label>
                    <span class="text-red-500">*</span>
                    </div>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input.select wire:model="state"  class="w-full" id="state">
                        <div class="px-4 overflow-y-auto">
                            <option>Select state</option>
                        @foreach (App\Models\Assets::STATE as $value => $label)
                                <option class="cursor-pointer" >
                                {{$label}} </option>
                        @endforeach
                        </div>
                    </x-input.select>
                    <x-jet-input-error for="state" class="mt-2" /> 
                    </div>
                </div>
                    
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <div class="flex space-x-1">
                    <label for="lga" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Local Government Area
                    </label>
                    <span class="text-red-500">*</span>
                    </div>          
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input.select wire:model="lga"  class="w-full" id="lga">
                        <div class="px-4 overflow-y-auto">
                            @if($state)<option>Select Local Government</option>@endif
                            @foreach (App\Models\Assets::LGA as $value => $label)
                                @if($label === $state)
                                    <option class="cursor-pointer">
                                    {{$value}} </option>
                                @endif
                            @endforeach
                        </div>
                    </x-input.select>
                    <x-jet-input-error for="lga" class="mt-2" />
                    </div>
                </div>
            </div>
        </div> -->

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="Address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Address
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.textarea wire:model.defer="address" class="w-full uppercase" type="text" placeholder=" Address"  />
          
          </div>
        </div>

        

        {{-- 
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
              <label for="date_of_birth" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Date of Birth 
              </label>
              <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <x-jet-input wire:model.defer="date_of_birth"  type="date"  class="w-full uppercase" id="date_of_birth" placeholder="last Name"  />
          
            </div>
          </div> 
        --}}

        {{-- 
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
              <label for="marital_status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Marital Status
              </label>
              <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.select  wire:model.defer="marital_status" class="w-full uppercase" id="marital_status">
              <div class="px-4 overflow-y-auto ">
                <option class="text-gray-300 uppercase cursor-pointer">Marital Status</option>
                @foreach (App\Models\Assets::MARITAL_STATUS as $value => $label)
                    <option class="text-gray-300 uppercase cursor-pointer">
                    {{$label}} </option>
                @endforeach
              </div>
            </x-input.select>
            <x-jet-input-error for="marital_status" class="mt-2" />
            </div>
          </div>
        --}}

