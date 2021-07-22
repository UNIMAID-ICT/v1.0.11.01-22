<div>
   
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                FACULTY TITLE
              </th>
              
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
              CODE           
              </th>

              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> 
              NO.              
              </th>

              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @forelse($faculties as $faculty)
            
            <tr>
              <td class="bg-blue-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ $faculty->school_title}}
              </td>
              
              <td class="bg-blue-50 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $faculty->school_code }}
              </td>

              <td class="bg-blue-50 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $faculty->school_no }}
              </td>

              <td class="bg-blue-50 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                
              </td>
             
            </tr>
            @forelse ($faculty->departments as $department )
            <thead class="bg-gray-50">
            <tr>
              
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DEPARTMENT TITLE
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DEPARTMENT CODE
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                -
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
                <tr>
              
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               {{ $department->dept_title }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $department->dept_no }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{-- Admin --}}
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
