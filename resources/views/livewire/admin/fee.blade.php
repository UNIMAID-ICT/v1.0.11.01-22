<x-slot name="header">
  <h1 class="relative text-xlg md:text-3xl pt-4 sm:pt-0 uppercase">{{ $this->deptschool->school_title ?? $this->department->dept_title }}</h1>
</x-slot>
<div class="mx-3   mb-6 sm:mx-20">
    @include('forms.feeEntry')
    
    @livewire('admin-display.faculty-fee', ['id' => $school->school_id])
</div>
