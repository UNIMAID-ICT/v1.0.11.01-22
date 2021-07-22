
{{-- @if($steps === 1)  --}}
<div class="space-y-8 divide-y divide-gray-200 mx-3 sm:mx-6">
  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">  
    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
      <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900">
          Personal Information
        </h3>
        <p class="max-w-2xl mt-1 text-sm text-gray-500">
          fields mark with <span class="text-red-500">*</span> are mandetory
        </p>
      </div>
      <div class="space-y-6 sm:space-y-5">
        {{-- personal Information --}}
        @include('forms.person')  
        {{-- Nationality  --}}
        <div x-data="{ open: true }" class="space-y-6">
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
                        <option>SELECT COUNTRY</option>
                    @foreach (App\Models\Assets::COUNTRY as $value => $label)
                            <option class="cursor-pointer" >
                            {{$label}} </option>
                    @endforeach
                    </div>
                </x-input.select>
                
                </div>
            </div>
            @if($country === 'Nigeria')               
            
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
                          <option>SELECT STATE</option>
                      @foreach (App\Models\Assets::STATE as $value => $label)
                              <option class="cursor-pointer" >
                              {{$label}} </option>
                      @endforeach
                      </div>
                  </x-input.select>
                  
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
                          @if($state)<option>SELECT LOCAL GOVERNMENT AREA</option>@endif
                          @foreach (App\Models\Assets::LGA as $value => $label)
                              @if($label === $state)
                                  <option class="cursor-pointer">
                                  {{$value}} </option>
                              @endif
                          @endforeach
                      </div>
                  </x-input.select>
                  
                  </div>
              </div>

            @endif

          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="blood_group" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Blood Group
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model="blood_group" id="blood_group">
                <div class="px-4 overflow-y-auto">
                    <option>SELECT BLOOD GROUP</option>
                @foreach (App\Models\Assets::BLOOD_GROUP as $value => $label)
                        <option class="cursor-pointer" >
                        {{$label}} </option>
                @endforeach
                </div>
            </x-input.select>
          </div>
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="disability" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Disability
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model="disability" id="disability">
                <div class="px-4 overflow-y-auto">
                    <option>SELECT DISABILITY</option>
                @foreach (App\Models\Assets::DISABLITY as $value => $label)
                        <option class="cursor-pointer" >
                        {{$label}} </option>
                @endforeach
                </div>
            </x-input.select>
          </div>
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="medical_condition" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Medical Condition
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input class="w-full uppercase" type="text" wire:model.defer="medical_condition" id="medical_condition" placeholder="Medical condition"  />
          </div>
        </div>

      </div>
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <div class="flex space-x-1">
            <label for="photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Upload Passport
            </label>
            {{-- <span class="text-red-500">*</span> --}}
          </div>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input class="w-full" type="file" wire:model="student_photo" id="student_photo"/>
            
          </div>
      </div>
    </div>
  </div>
  <div class="bg-gray-100 border-b"></div>
</div>


<div class="space-y-8 divide-y divide-gray-200 mx-3 sm:mx-6">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">   

      <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
        <div>
          <h3 class="text-lg font-medium leading-6 text-gray-900">
            Next of kin Information
          </h3>
          <p class="max-w-2xl mt-1 text-sm text-gray-500">
            fields mark with <span class="text-red-500">*</span> are mandetory
          </p>
        </div>
        <div class="space-y-6 sm:space-y-5">
        {{-- person Next of kin  --}}
        @include('forms.next_of_kin')
                

        </div>
      </div>

    </div>
    <div class="bg-gray-100 border-b"></div>
</div>

{{-- Sponsor Information --}}
<div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 mx-3 sm:mx-6">  
  <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
    <div>
      <h3 class="text-lg font-medium leading-6 text-gray-900">
        Sponsor Information
      </h3>
      <p class="max-w-2xl mt-1 text-sm text-gray-500">
        fields mark with <span class="text-red-500">*</span> are mandetory
      </p>
    </div>
    <div class="space-y-6 sm:space-y-5">
    {{-- person Next of kin  --}}
      @include('forms.sponsor')
    </div>
  </div>
</div>

<div class="py-5 mx-3">

  <div class="flex justify-end">
    <x-jet-button wire:click.prevent="updateRecord" wire:target="gotoPrevious, updateRecord" wire:loading.attr="disabled"  >
        {{ __('Continue') }}
    </x-jet-button>
   </div>
           <div class="flex justify-end">
            <div class="flex-col sm:justify-end">
              <x-jet-input-error for="fullname" class="mt-2" />
              <x-jet-input-error for="surname" class="mt-2" />
              <x-jet-input-error for="gender" class="mt-2" />
              <x-jet-input-error for="date_of_birth" class="mt-2" />
              <x-jet-input-error for="nin" class="mt-2" />
              <x-jet-input-error for="telephone" class="mt-2" />
              <x-jet-input-error for="email" class="mt-2" />
              <x-jet-input-error for="address" class="mt-2" />
              <x-jet-input-error for="country" class="mt-2" /> 
              <x-jet-input-error for="state" class="mt-2" /> 
              <x-jet-input-error for="lga" class="mt-2" />
              <x-jet-input-error for="photo" class="mt-2" />
              
              <x-jet-input-error for="next_title" class="mt-2" />
              <x-jet-input-error for="next_fullname" class="mt-2" />
              <x-jet-input-error for="surname" class="mt-2" />
              <x-jet-input-error for="next_gender" class="mt-2" />
              <x-jet-input-error for="next_telephone" class="mt-2" />
              <x-jet-input-error for="next_address" class="mt-2" />
              
              <x-jet-input-error for="spon_title" class="mt-2" />
              <x-jet-input-error for="spon_fullname" class="mt-2" />
              <x-jet-input-error for="spon_gender" class="mt-2" />
              <x-jet-input-error for="spon_telephone" class="mt-2" />
              <x-jet-input-error for="spon_address" class="mt-2" />
            </div>
        
        </div>
</div>
<x-notification />



