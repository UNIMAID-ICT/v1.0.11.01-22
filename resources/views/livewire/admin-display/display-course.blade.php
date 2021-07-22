<div>
   
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-blue-200">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                PROGRAMME TITLE
              </th>
              
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
              CODE           
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
              -           
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
              -           
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
              -           
              </th>
            

              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @forelse($programs as $program)
            
            <tr>
              <td class="bg-blue-200 px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                {{ $program->pro_title}}
              </td>
              
              <td class="bg-blue-200 px-6 py-4 whitespace-nowrap text-md text-gray-500">
                {{ $program->pro_code }}
              </td>
              <td class="bg-blue-200 px-6 py-4 whitespace-nowrap text-md text-gray-500">
                -
              </td>
              <td class="bg-blue-200 px-6 py-4 whitespace-nowrap text-md text-gray-500">
                -
              </td>
              <td class="bg-blue-200 px-6 py-4 whitespace-nowrap text-md text-gray-500">
                -
              </td>
              <td class="bg-blue-200 px-6 py-4 whitespace-nowrap text-md text-gray-500">
                -
              </td>

              
             
            </tr>
            @forelse ($program->courses as $course )
            <thead class="bg-blue-50">
            <tr>
              
              <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                COURSE TITLE
              </th>
              <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                COURSE CODE
              </th>
              <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                UNITS
              </th>
              <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                ELECTIVE
              </th>
              <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                PRE-REQUISITE
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
                <tr>
              
              <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
               {{ $course->course_title }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                {{ $course->course_code }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                {{$course->units}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                {{$course->elective}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                {{$course->pre_requisite}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>
            @empty
                
            @endforelse
            
            @empty
          @endforelse
                
            
            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>
