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


            {{-- <div class="flex items-center">
                <x-jet-responsive-nav-link class="flex items-center w-full px-4 py-2 text-gray-700 rounded dark:text-gray-200"  href="{{ route('admin.course_combination') }}" :active="request()->routeIs('admin.course_combination')">
                  <svg class="w-5 h-5 mr-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  {{ __('Course Combination') }}
               </x-jet-responsive-nav-link>
            </div> --}}

		  </div>

			@include('navigation-bar.profileNav')
		</nav>
	</div>
</div>
