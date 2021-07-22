<x-slot name="header">
  <h1 class="relative pt-4 uppercase text-xlg md:text-3xl sm:pt-0"></h1>
{{-- Department of {{ $student->department->dept_title}} Student: {{ $returingStd}} --}}
</x-slot>
<div class="mx-3 mt-16 mb-6 sm:mx-20">
    <!-- component -->
<!-- Profile Card -->
<div>
   <div class="grid-cols-4 grid-rows-2 gap-2 p-4 bg-white md:grid rounded-xl">
        <div class="h-48 shadow-xl md:col-span-1 ">
                <div class="relative flex w-full h-full">
                    <img src="https://res.cloudinary.com/dboafhu31/image/upload/v1625318266/imagen_2021-07-03_091743_vtbkf8.png" class="m-auto w-44 h-44" alt="">
                </div>
        </div>


        <div class="h-48 p-3 my-1 space-y-2 shadow-xl md:col-span-3">
                <div class="flex ">
                    <span
                        class="px-4 py-2 text-sm font-bold uppercase whitespace-no-wrap border border-2 rounded-l w-44 bg-blue-50 bg-gray-50">Name:</span>
                    <label for="fullname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                       {{ $stdId->fullname }}
                    </label>
                </div>
                <div class="flex ">
                    <span
                        class="px-4 py-2 text-sm font-bold uppercase whitespace-no-wrap border border-2 rounded-l w-44 bg-blue-50 bg-gray-50">ID:</span>
                    <label for="ID" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                             {{ $stdId->student_id_number }}
                    </label>
                </div>
                 <div class="flex ">
                    <span
                        class="px-4 py-2 text-sm font-bold uppercase whitespace-no-wrap border border-2 rounded-l w-44 bg-blue-50 bg-gray-50">Programme:</span>
                   <label for="fullname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                             {{ $stdId->department->dept_title }}
                    </label>
                </div>

                 <div class="flex ">
                    <span
                        class="px-4 py-2 text-sm font-bold uppercase whitespace-no-wrap border border-2 rounded-l w-44 bg-blue-50 bg-gray-50">Level:</span>
                   <label for="fullname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                         {{ $stdId->level }}
                    </label>
                </div>
        </div>


        <div class="hidden h-48 p-4 space-y-2 shadow-xl md:col-span-3 md:block">
            <h3 class="font-bold uppercase"> Profile Description</h3>
            <p class="">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget laoreet diam, id luctus lectus. Ut consectetur nisl ipsum, et faucibus sem finibus vitae. Maecenas aliquam dolor at dignissim commodo. Etiam a aliquam tellus, et suscipit dolor. Proin auctor nisi velit, quis aliquet sapien viverra a.
            </p>
        </div>

    </div>
</div>
</div>
