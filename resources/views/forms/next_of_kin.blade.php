        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="next_title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Title
            </label>
            {{-- <span class="text-red-500">*</span> --}}
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
          
          <x-jet-input  type="text"  wire:model.defer="next_title" class="w-full uppercase" id="next_title" placeholder="Next of Kin Title"  />
          
          </div>
        </div>

        
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="next_fullname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Name 
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  type="text" wire:model.defer="next_fullname"  class="w-full uppercase " id="next_fullname" placeholder="Next of Kin Full Name"  />
            
          </div>
        </div>

        {{-- <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
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
        </div> --}}

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="gender"  class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Gender
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
              <x-input.select wire:model="next_gender"  class="w-full" id="next_gender">
                  <div class="px-4 overflow-y-auto">
                      <option>SELECT GENDER</option>
                      @foreach (App\Models\Assets::GENDER as $value => $label)                          
                        <option class="cursor-pointer">
                           {{$value}} 
                        </option>                         
                      @endforeach
                  </div>
              </x-input.select>         
          
          </div>
        </div>


      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="flex space-x-1">
          <label for="next_telephone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Telephone
          </label>
          <span class="text-red-500">*</span>
        </div>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-jet-input wire:model.debounce.300ms="next_telephone" wire:target="saveStaff, reset" wire:loading.attr="disabled" maxlength="11" class="w-full uppercase" type="text" id="next_telephone" placeholder="next_telephone"  />
        
        </div>
      </div>

      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="flex space-x-1">
            <label for="next_address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Address
            </label>
            <span class="text-red-500">*</span>
        </div>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.textarea wire:model.defer="next_address" class="w-full uppercase" type="text" placeholder="Next of Kin Address"  />
            
        </div>
      </div>

