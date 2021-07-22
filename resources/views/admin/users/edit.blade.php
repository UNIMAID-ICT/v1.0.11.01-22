<x-app-layout>

		<x-slot name="header">
			<h2 class="flex justify-between text-xl font-semibold leading-tight text-gray-800">
				{{ __('Edit User') }}
				<a class="p-2 font-sans text-sm text-white bg-blue-400 rounded-md shadow hover:bg-blue-500"
		          href="{{ route('admin.users.index') }}">Back</a>
			</h2>
		</x-slot>
 <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <x-jet-validation-errors class="mb-4" />

        <form class="p-4 mx-8" method="POST" action="{{ route('admin.users.update', $user->id) }}">
		    @method('PATCH')
			@csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <input id="name" class="block w-full mt-1 form-input" type="text" name="name" value="{{ old('name') }} @isset($user) {{ $user->name}}@endisset"   autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <input id="email"  class="block w-full mt-1 form-input" type="email" name="email" value="{{ old('email') }} @isset($user) {{ $user->email}}@endisset"   />
            </div>

            <!-- <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" value="@isset($password) {{ $user->password}}@endisset" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div> -->
			<div class="flex items-center p-2 mt-2 text-lg border-b ">
				Roles
			</div>
            <div class="flex flex-col mt-4 space-y-4">
			  @foreach($roles as $role)
				<div class="flex space-x-4 ">
               <input class="form-checkbox" type="checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->id}}"
			   		@isset($user)
					 @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif
					@endisset >
					<x-jet-label for="{{ $role->name }}" value="{{ $role->name }}" />
				</div>

			  @endforeach
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
             </div>
        </div>
    </div>
</x-app-layout>