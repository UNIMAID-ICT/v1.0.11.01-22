<x-app-layout>
    {{--
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <x-jet-welcome />
                </div>
            </div>
        </div>
    --}}


     @can('isSuperAdmin')
        {{-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg"> --}}
                    @livewire('admin.super-admin-welcome')
                {{-- </div>
            </div>
        </div> --}}
    @endcan

    @can('isAdmin')
        {{-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg"> --}}
                    @livewire('admin.admin-welcome')
                {{-- </div>
            </div>
        </div> --}}
    @endcan



    @can('isViceChancellor')
        @livewire('vc.vc-dashboard')
    @endcan

    @can('isRegistrar')
        {{-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg"> --}}

                {{-- </div>
            </div>
        </div> --}}
    @endcan

    @can('isBursar')

    @endcan

    @can('isCourseSystem')

    @endcan

    @can('isDeanStudentAffair')

    @endcan

    @can('isDean')
        @livewire('dean.dean-dashboard')
    @endcan

    @can('isHeadofDepartment')
        {{-- <div class="py-6"> --}}
            {{-- <div class="mx-auto max-w-7xl sm:px-6 lg:px-8"> --}}
                {{-- <div class=""> --}}
                    @livewire('hod.admin-hod')
                {{-- </div>
            </div>
        </div> --}}
    @endcan

    @can('isDepartmentCoordinator')
        {{-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg"> --}}
                @livewire('department-cordinator.cordinator-welcome')
                {{-- </div>
            </div>
        </div> --}}
    @endcan

    @can('isStaff')
        {{-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class=""> --}}
                    @livewire('admin.upload-result')
                {{-- </div>
            </div>
        </div> --}}
    @endcan

    @can('isStudent')
        {{-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg"> --}}
                    @livewire('student.student-welcome')
                {{-- </div>
            </div>
        </div> --}}
    @endcan

</x-app-layout>
