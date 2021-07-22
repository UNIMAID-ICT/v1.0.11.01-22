<div class="my-10">
            <!-- Transactions Table -->
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['title'] ?? null" class="">s/no</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['student_id_number'] ?? null" class="">FEE TYPE</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('amount')" :direction="$sorts['Name'] ?? null">STUDENT TYPE</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('status')" :direction="$sorts['faculity'] ?? null">LEVEL</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">AMOUNT</x-table.heading>

                </x-slot>

                <x-slot name="body">

                    @forelse ($fees as $fee)
                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $fee->id }}">


                        <x-table.cell>
                            <span href="#" class="inline-flex space-x-2 text-sm leading-5 truncate">
                                {{-- <x-icon.cash class="text-cool-gray-400"/> --}}

                                <p class="truncate text-cool-gray-600">
                                    {{ $loop->iteration }}
                                </p>
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="font-medium text-cool-gray-900"> {{ $fee->fee_type }} </span>
                        </x-table.cell>

                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                        <x-table.cell>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                            {{ $fee->student_type }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $fee->level }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $fee->amount }}
                        </x-table.cell>

                        <x-table.cell>
                            <div class="flex justify-between">
                                <x-jet-button  wire:click.prevent="open_amount_modal({{ $fee->id }})" wire:target="open_amount_modal" wire:loading.attr="disabled" >{{ __('Edit') }} </x-jet-button>
                                <x-button.link wire:click="removeFee({{ $fee->id }})" class="px-2 py-1 text-white bg-red-500 rounded-md" >Delete</x-button.link>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                    @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="flex items-center justify-center space-x-2">
                                <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                                <span class="py-8 text-xl font-medium text-cool-gray-400">No Fee Added...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div>
                {{-- {{ $students->links() }} --}}
            </div>
        </div>
        @include('modelDialog.edit_fee')

</div>
