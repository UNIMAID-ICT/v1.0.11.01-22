<x-slot name="header">
  {{-- <h1 class="relative pt-4 uppercase text-xlg md:text-3xl sm:pt-0">@if ( $department->dept_title === 'FACULTY OF VETERINARY MEDICINE')
    {{ $department->dept_title }}
    @elseif($department->dept_title === 'FACULTY OF EDUCATION')
    {{ $department->dept_title }}
    @else
     DEPARTMENT OF {{ $department->dept_title }}  @endif</h1> --}}
  <x-notification />
</x-slot>

<div>
{{-- {{ $department->dept_title }} --}}
    @if($department->dept_title === 'MATHEMATICAL SCIENCES')

        @livewire('sub-department.display-computer-science')

    @elseif($department->dept_title === 'BIOLOGICAL SCIENCE')

      @include('forms.biologicalScienceMainCourses')

      @livewire('sub-department.display-biological')

    @elseif($department->dept_title === 'FACULTY OF EDUCATION')

        @livewire('sub-department.display-edu')

    @elseif($department->dept_title === 'PHYSICAL AND HEALTH EDUCATION')

        @livewire('sub-department.display-phe-edu')

    @elseif($department->dept_title === 'PURE AND APPLIED CHEMISTRY')

        @livewire('sub-department.display-pure-and-applied')

    @elseif($department->dept_title === 'FACULTY OF VETERINARY MEDICINE')
        @livewire('sub-department.display-vet')
    @else

        @include('forms.hod_course_level_semester')

    @endif
</div>







