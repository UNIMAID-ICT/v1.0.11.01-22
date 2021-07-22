<div>
    <x-jet-dialog-modal wire:model:model="edit_fee_modal">

        <x-slot name="title">
            <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-blue-600">
            <span class="ml-4 font-bold text-white">EDIT AMOUNT</span>
            <span class="mr-6 font-bold text-white"></span>
            </div>
            <x-notification />
        </x-slot>

        <x-slot name="content">
            <div class="w-full pt-6 sm:mt-0">
                <div class="">
                    <div class="px-2 py-3 space-y-4 rounded-md shadow">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="amount" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Amount
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-jet-input class="w-full" type="text" wire:model.defer="amount"  placeholder="Amount" maxlength="6"  />
                            </div>
                            <x-jet-input-error for="amount" class="mt-2" />
                        </div>
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
        <!-- Add record buttons -->
        <div class="flex items-center justify-between w-full space-x-4">


                    <div class="flex items-center justify-between w-full space-x-4">
                        <x-jet-button wire:click.prevent="done" wire:loading.attr="disabled" wire:target="done, updateFee" >
                           {{ __('Done') }}
                        </x-jet-button>

                        <div class="flex items-center justify-between space-x-4">
                            <x-jet-action-message class="" on="saved">
                                    {{ __('Saved') }}
                            </x-jet-action-message>
                            <x-jet-button wire:click.prevent="updateFee" wire:target="updateFee, done" wire:loading.attr="disabled"
                             class="bg-green-500 hover:bg-green-700" >
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </div>

        </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>


