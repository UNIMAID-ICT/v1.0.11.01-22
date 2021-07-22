<div class="p-2 space-y-2 shadow-md border-1">
    <div class="font-bold">SESSION CONTROL</div>
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
        <div class="flex space-x-1">
            <label for="start_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Start Year
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  type="date" wire:model.defer="start_at"  class="w-full uppercase " id="start_at" placeholder="start_at"  />
        </div>
    </div>

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
        <div class="flex space-x-1">
            <label for="end_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                End Year
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  type="date" wire:model.defer="end_at"  class="w-full uppercase " id="end_at" placeholder="end_at"  />
        </div>
    </div>

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
        <div class="flex space-x-1">
            <label for="first_date" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                first_date
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  type="text" wire:model.defer="first_date"  class="w-full uppercase " id="first_date" placeholder="first_date"  />
        </div>
    </div>

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
        <div class="flex space-x-1">
            <label for="second_date" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                second_date
            </label>
            <span class="text-red-500">*</span>
            </div>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-jet-input  type="text" wire:model.defer="second_date"  class="w-full uppercase " id="second_date" placeholder="second_date"  />
        </div>
    </div>
</div>

<div class="p-2 space-y-2 shadow-md border-1">
    <div class="font-bold">FEE CONTROL</div>
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
        <x-jet-button wire:click="save_new_user"  wire:target="save_new_user" wire:loading.attr="disabled" class="bg-green-400 shadow-sm hover:bg-green-700">
            {{ __('START PAYMENT') }}
        </x-jet-button>

        <x-jet-button wire:click="save_new_user"  wire:target="save_new_user" wire:loading.attr="disabled" class="bg-red-400 shadow-sm hover:bg-red-700">
            {{ __('STOP PAYMENT') }}
        </x-jet-button>
    </div>
</div>


