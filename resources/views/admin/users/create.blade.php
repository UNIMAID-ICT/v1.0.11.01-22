<x-app-layout>

		<x-slot name="header">
			<h2 class="flex justify-between text-xl font-semibold leading-tight text-gray-800">
				{{ __('Create New User') }}
				<a class="p-2 font-sans text-sm text-white bg-blue-400 rounded-md shadow hover:bg-blue-500"
		          href="{{ route('admin.users.index') }}">Back</a>
			</h2>
		</x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" />

            <form class="p-4 mx-8" method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                @foreach($roles as $role)
                <x-jet-label for="{{ $role->name }}" value="{{ $role->name }}" />
                <x-input.checkbox data-toggle="modal" data-target="#open_fetch_school_faculty_modal"  name="roles[]" value="{{ $role->id}}" id="{{ $role->id}}">
                </x-input.checkbox>
                @endforeach
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Submit') }}
                    </x-jet-button>
                </div>
            </form>
            {{-- @if($role->name === 'Dean')  --}}
                {{-- @include('modelDialog.fetch_school') --}}
            </div>
        </div>
    </div>
</x-app-layout>