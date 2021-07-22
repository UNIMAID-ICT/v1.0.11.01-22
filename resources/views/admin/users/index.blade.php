<x-app-layout>
<x-slot name="header">
	<h2 class="flex justify-between font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Super Admin Dashboard') }}
		<a class="text-white font-sans text-sm bg-green-400 hover:bg-green-500 p-2 shadow rounded-md"
		href="{{ route('admin.users.create') }}">Create</a>
	</h2>
</x-slot>

 <div class="py-12 ">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		@if(session('error'))
		<div class="shadow rounded-md bg-red-400 text-white text-md font-sans p-3 mb-3">
			You cannot edit this User{{ session('error') }}
		</div>
		@endif
		@if(session('success'))
		<div class="shadow rounded-md bg-green-400 text-white text-md font-sans p-3 mb-3">
			{{ session('success') }}
		</div>
		@endif
 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
 {{-- Notification @livewire('notification.user-created') --}}

	<x-table>
		<x-slot name="head">
			<x-table.heading class="w-4 text-left">#Id</x-table.heading>
			<x-table.heading class="text-left" >Name</x-table.heading>
			<x-table.heading class="w-full text-left" >Email</x-table.heading>
			<x-table.heading class="text-left" >Action</x-table.heading>
			<x-table.heading />
		</x-slot>

		<x-slot name="body">

			@foreach($users as $user)
			<x-table.row>
				<x-table.cell>
					<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 capitalize">
							{{ $user->id }}
					</span>
				</x-table.cell>
				<x-table.cell>
					<span class="w-36 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 capitalize">
							{{ $user->name }}
					</span>
				</x-table.cell>
				<x-table.cell>
					<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 capitalize">
							{{ $user->email }}
					</span>
				</x-table.cell>

				<x-table.cell class="space-x-3 flex">
					<a class="text-white rounded-md font-sans text-sm bg-indigo-400 hover:bg-indigo-500 p-2 shadow"
					href="{{ route('admin.users.edit', $user->id) }}">Edit</a>

					<button type="button" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit()">
					 <span class="text-white rounded-md font-sans text-sm bg-red-400 hover:bg-red-500 p-2 shadow">Delete</span>
					 </button>

					<form class="hidden" id="delete-user-form-{{ $user->id }}"
					 action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
					  @method('DELETE')
					  @csrf
					</form>
				</x-table.cell>
			</x-table.row>
			@endforeach

		</x-slot>
	</x-table>

			<div class="mx-2 py-4 px-6">
				{{ $users->links() }}
			</div>

            </div>
        </div>
    </div>
</x-app-layout>