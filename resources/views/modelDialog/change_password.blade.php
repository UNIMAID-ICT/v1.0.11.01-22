<div class="pt-28">
    <x-jet-dialog-modal  wire:model="change_password">

        <x-slot name="title">
            <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-indigo-400">
            <span class="ml-4 font-bold text-white">Change Your Password</span>
            <span class="mr-6 font-bold text-white"></span>
            </div>
            <x-notification />
        </x-slot>
        
        <x-slot name="content">
            @livewire('profile.update-password-form')
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-start">
                <x-jet-button wire:click.prevent="$set('change_password', false)" wire:target='done' wire.loading.attr="disabled" class="ml-4">
                            {{ __('Close') }}
                </x-jet-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>