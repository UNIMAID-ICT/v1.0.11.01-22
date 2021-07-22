<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

 	<div class="flex h-screen overflow-hidden bg-cool-gray-100" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">

        <!-- Off-canvas menu for mobile -->
        <div x-show="sidebarOpen" class="md:hidden" style="display: none;">
            <div class="fixed inset-0 z-40 flex">
            <div @click="sidebarOpen = false" x-show="sidebarOpen" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0" style="display: none;">
                    <div class="absolute inset-0 bg-gray-600 opacity-75">

                   </div>
                </div>
                <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state." x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex flex-col flex-1 w-full max-w-xs bg-gray-200" style="display: none;">
                    <div class="absolute top-0 right-0 p-1 -mr-14">

                        <button x-show="sidebarOpen" @click="sidebarOpen = false" class="flex items-center justify-center w-12 h-12 rounded-full focus:outline-none focus:bg-gray-600" aria-label="Close sidebar" style="display: none;">
                            <svg class="w-6 h-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                <div class="flex-1 h-auto pb-4 overflow-y-auto">
                    <div class="flex flex-col flex-1 h-auto overflow-y-auto">
                        <h2 class="text-3xl font-semibold text-gray-800 dark:text-white">UNIMAID</h2>
                    </div>
                      @livewire('nav.side-bar')
                </div>

                </div>
                <div class="flex-shrink-0 w-14">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->

        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-100 shadow-lg md:w-72">
                <div class="flex flex-col flex-1 h-auto overflow-y-auto">

                    <div class="flex flex-col items-center justify-center flex-shrink-0 px-4 pt-10 -mt-5 bg-blue-200">
                        <img class="w-24 h-24" src="/logo-jud.png" alt="UNIMAID IMAGE">
                        <h2 class="my-4 text-3xl font-semibold tracking-widest text-white dark:text-white"> UNIMAID</h2>
                    </div>

                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    @livewire('nav.side-bar')

                </div>
            </div>
        </div>

        <div class="relative flex flex-col flex-1 w-0 overflow-hidden">
        <div class="absolute z-30 flex justify-between w-full bg-blue-200 sm:justify-end">
             <!-- top menu-->
        <div class="absolute flex items-center justify-between w-full px-3 py-3 bg-blue-200 md:justify-end">
            <button x-cloak @click.stop="sidebarOpen = true" class="md:hidden -ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150" aria-label="Open sidebar">
                    <svg class="w-6 h-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
				</button>

                    <!-- top menu-->
             <div class="flex justify-center mr-12 space-x-5 ">
                <button class="text-gray-400 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: bell -->
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                    <button class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                        <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>

                @else
                    <button class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                @endif
             </div>
        </div>

        </div>

        <div class="">
        <main class="right-0 flex-1 w-full pt-2 pb-6 top-15 focus:outline-none md:py-6" tabindex="0" x-data="" x-init="$el.focus()">
           @if (isset($header))
             <header class="bg-white shadow-md">
                <div class="px-4 py-6 max-w-7xl mt-9 mx-9 sm:px-6 lg:px-8 ">
                    {{ $header }}
                </div>
            </header>
            @endif
            <div class="h-screen max-w-full pb-40 mx-auto overflow-y-auto sm:px-6">
                <!-- Page Heading -->
                {{ $slot }}
            </div>
            <!-- <footer id="footer" class="h-20">
                <h1>Am footer</h1>
            </footer> -->
        </main>
        </div>

        {{-- <x-notification /> --}}
    </div>



        @stack('modals')

        @livewireScripts
    </body>
</html>
