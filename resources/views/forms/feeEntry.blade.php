
<div class="mx-3 space-y-8 divide-y divide-gray-200 sm:mx-6">
  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
      <div class="space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
          <label for="disability" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            FEE TYPE
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model="fee_type" id="fee_type">
                <div class="px-4 overflow-y-auto">
                    <option>SELECT FEE TYPE</option>
                @foreach (App\Models\Assets::FEE_TYPE as $value => $label)
                        <option class="cursor-pointer" >
                        {{$label}} </option>
                @endforeach
                </div>
            </x-input.select>
          </div>
          </div>
        </div>
      </div>

    <div class="space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="student_type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            STUDENT TYPE
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model="student_type" id="student_type">
                <div class="px-4 overflow-y-auto">
                    <option>SELECT STUDENT TYPE</option>
                @foreach (App\Models\Assets::STUDENT_TYPE as $value => $label)
                        <option class="cursor-pointer" >
                        {{$label}} </option>
                @endforeach
                </div>
            </x-input.select>
        </div>
        </div>
        </div>
    </div>

    <div class="space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="student_type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            LEVEL APPLIED TO
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model="level" id="level">
                <div class="px-4 overflow-y-auto">
                    <option>SELECT LEVEL</option>
                @foreach (App\Models\Assets::FEE_LEVEL as $value => $label)
                        <option class="cursor-pointer" >
                        {{$label}} </option>
                @endforeach
                </div>
            </x-input.select>
        </div>
        </div>
        </div>
    </div>
    <div class="space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="student_type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            DEPARTMENT APPLIED TO
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-input.select  class="w-full" wire:model="department_id" id="department_id">
                <div class="px-4 overflow-y-auto">
                    <option>SELECT DEPARTMENT</option>
                @foreach ($departments as  $department)
                        <option class="cursor-pointer" value="{{ $department->id }}">
                        {{ $department->dept_title }} </option>
                @endforeach
                </div>
            </x-input.select>
        </div>
        </div>
        </div>
    </div>

      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="flex space-x-1">
          <label for="amount" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Amount
          </label>
          <span class="text-red-500">*</span>
        </div>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-jet-input wire:model="amount" wire:keydown.enter="saveFee" wire:target="amount"  maxlength="6" class="w-full uppercase" type="text"  placeholder="Amount"/>
        </div>
      </div>

    </div>
  </div>
  <div class="bg-gray-100 border-b"></div>
</div>

<div class="py-5 mx-3">

  <div x-data class="flex justify-end">

    <x-jet-button  wire:click.prevent="saveFee" wire:loading.attr="disabled" wire:target="saveFee">{{ __('Save') }} </x-jet-button>
   </div>
   <div class="flex justify-end">
        <div class="flex-col sm:justify-end">
            <x-jet-input-error for="school_id" class="mt-2" />
            <x-jet-input-error for="fee_type" class="mt-2" />
            <x-jet-input-error for="student_type" class="mt-2" />
            <x-jet-input-error for="level" class="mt-2" />
            <x-jet-input-error for="amount" class="mt-2" />
        </div>
    </div>
   </div>
<x-notification />



