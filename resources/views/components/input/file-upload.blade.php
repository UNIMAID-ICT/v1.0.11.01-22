

<div class="flex items-center">


    <div class=" flex flex-col justify-center items-center space-y-3" x-data="{ focused: false }">

            <div class=" flex flex-col space-y-3 justify-center items-center h-40 w-40  overflow-hidden bg-gray-100">

            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 icon icon-tabler icon-tabler-camera"   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                        <circle cx="12" cy="13" r="3" />
                </svg>


                <input @focus="focused = true" @blur="focused = false" class="sr-only" type="file" {{ $attributes }}>
            </div>

        </div>
        <div class="flex justify-center items-center">
                <label for="{{ $attributes['id'] }}" :class="{ 'outline-none border-blue-300 shadow-outline-blue': focused }" class="cursor-pointer py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Select File
                </label>
            </div>
    </div>
</div>
