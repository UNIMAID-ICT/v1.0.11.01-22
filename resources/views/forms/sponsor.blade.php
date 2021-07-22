        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="spon_title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Title
            </label>
            {{-- <span class="text-red-500">*</span> --}}
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">          
          <x-jet-input  type="text"  wire:model.defer="spon_title" class="w-full uppercase" id="spon_title" placeholder="Sponsor Title"  />
          
          </div>
        </div>

        
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="spon_fullname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Name 
            </label>
            <span class="text-red-500">*</span>
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  type="text" wire:model.defer="spon_fullname"  class="w-full uppercase " id="spon_fullname" placeholder="Sponsor Full Name"  />
            
          </div>
        </div>


        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
                <label for="spon_gender"  class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Gender
                </label>
                <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <x-input.select wire:model="spon_gender"  class="w-full" id="spon_gender">
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
            <label for="spon_telephone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Telephone
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input wire:model.debounce.300ms="spon_telephone" wire:target="saveStaff, reset" wire:loading.attr="disabled" maxlength="11" class="w-full uppercase" type="text" id="spon_telephone" placeholder="spon_telephone"  />
            
            </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <div class="flex space-x-1">
                <label for="spon_address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Address
                </label>
                <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <x-input.textarea wire:model.defer="spon_address" class="w-full uppercase" type="text" placeholder="Sponsor Address"  />
            
            </div>
        </div>

