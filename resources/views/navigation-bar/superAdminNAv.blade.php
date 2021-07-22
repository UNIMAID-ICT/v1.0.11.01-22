   <div class="flex flex-col px-4 py-2 bg-white border-r dark:bg-gray-800 dark:border-gray-600">
	<div class="flex flex-col justify-between flex-1 mt-1 space-y-3">
		<nav>
		  <div class="space-y-3">
            <div class="flex items-center">
               <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 bg-gray-200 rounded dark:text-gray-200"  href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
                  {{ __('Dashboard') }}
               </x-jet-responsive-nav-link>
            </div>

            <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.createUser') }}" :active="request()->routeIs('admin.createUser')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Create User') }}
               </x-jet-responsive-nav-link>
            </div>

            <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.editUser') }}" :active="request()->routeIs('admin.editUser')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Edit User') }}
               </x-jet-responsive-nav-link>
            </div>

            <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.importStudents') }}" :active="request()->routeIs('admin.importStudents')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Import Student') }}
               </x-jet-responsive-nav-link>
            </div>

            <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.importDepartments') }}" :active="request()->routeIs('admin.importDepartments')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Import Department(s)') }}
               </x-jet-responsive-nav-link>
            </div>

            <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.importProgrammes') }}" :active="request()->routeIs('admin.importProgrammes')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Import Programme(s)') }}
               </x-jet-responsive-nav-link>
            </div>

            <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.importCourses') }}" :active="request()->routeIs('admin.importCourses')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Import Course(s)') }}
               </x-jet-responsive-nav-link>
            </div>

            <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.fee') }}" :active="request()->routeIs('admin.fee')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('FEE ENTRY') }}
               </x-jet-responsive-nav-link>
            </div>

            {{-- <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.passwordGen') }}" :active="request()->routeIs('admin.passwordGen')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Generate Password') }}
               </x-jet-responsive-nav-link>
            </div> --}}

		  </div>
          <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
            <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            {{ __('Profile') }}
        </x-jet-responsive-nav-link>
			@include('navigation-bar.profileNav')
		</nav>
	</div>
</div>
