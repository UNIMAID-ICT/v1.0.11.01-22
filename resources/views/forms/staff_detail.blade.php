       
<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <div class="flex space-x-1">
    <label for="id_number" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        File Number 
    </label>
    <span class="text-red-500">*</span>
    </div>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
    <x-jet-input wire:model.debounce.100ms="id_number" class="w-full uppercase" type="text"  id="id_number" placeholder="File Number"  />
    <x-jet-input-error for="id_number" class="mt-2" />
    </div>
</div>        

<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <div class="flex space-x-1">
    <label for="gender" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        Select Status
    </label>
    <span class="text-red-500">*</span>
    </div>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
    <x-input.select wire:model.defer="status" class="w-full uppercase"  id="status">
    <div class="px-4 overflow-y-auto ">
        <option class="text-gray-300 uppercase cursor-pointer">Select Status</option>
        @foreach (App\Models\Assets::PERSON_TYPE as $value => $label)
            <option class="text-gray-300 uppercase cursor-pointer">
            {{$label}} </option>
        @endforeach
    </div>
    </x-input.select>
    <x-jet-input-error for="status" class="mt-2" />
    </div>
</div>
        



