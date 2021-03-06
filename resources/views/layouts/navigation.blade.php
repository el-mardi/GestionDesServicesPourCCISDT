<nav x-data="{ open: false }" class="pt-4 shadow-sm mb-5 bg-slate-200 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16">
            <div class="flex ">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                            
                        <a href="{{route('dashboard')}}" class="block hover:text-indigo-600 hover:border-b-2 hover:border-indigo-600  text-sm   {{ request()->routeIs('dashboard') ? 'text-indigo-600 ' : 'text-slate-600' }} pb-2">
                            <img src="{{ asset('images/logo_ccis_dt_2-removebg-preview.png') }}" 
                            class="inline h-10 w-auto fill-current text-brown-600"> <span class="inline mx-2">GestDSR</span> 
                        </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-14 sm:mr-10 sm:flex">
                   
                    @if (Auth::user()->admin != 1 )
                    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                        <a href="{{route('ressortissant.index')}}" class="m-auto hover:text-indigo-600 hover:border-b-2 hover:border-indigo-600 text-sm   {{ request()->routeIs('ressortissant.*') ? 'text-indigo-600 border-b-2 border-indigo-600 ' : 'text-slate-600' }}">
                         RESSORTISSANT
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                        <a href="{{route('orientation')}}" class="m-auto hover:text-indigo-600 hover:border-b-2 hover:border-indigo-600  text-sm   {{ request()->routeIs('orientation') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-slate-600' }}">
                         ORIENTATION/INFORMATION
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                        <a href="{{route('accompagnement')}}" class="m-auto hover:text-indigo-600 hover:border-b-2 hover:border-indigo-600  text-sm   {{ request()->routeIs('accompagnement') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-slate-600' }}">
                         ACCOMPAGNEMENT
                        </a>
                        
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex" >
                        <a href="{{route('documents')}}"  class="m-auto hover:text-indigo-600 hover:border-b-2 hover:border-indigo-600  text-sm   {{ request()->routeIs('document') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-slate-600' }}  {{ request()->routeIs('documents') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-slate-600' }}">
                         D??LIVRANCE DOCUMENTS
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                        <a href="{{route('adhesion')}}" class="m-auto hover:text-indigo-600 hover:border-b-2 hover:border-indigo-600  text-sm   {{ request()->routeIs('adhesion') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-slate-600' }}">
                         ADHESION
                        </a>
                    </div>

                    @endif
                    
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                @if ( Auth::user()->admin === 1 )
                <div class="mr-4">
                    {{-- <x-nav-link :href="route('notification')" :active="request()->routeIs('notification')"> --}}
                        <a href="{{route('notifications')}}"><i class="fa-solid fa-bell fa-xl" style="color:rgb(80, 124, 140)"></i></a>
                        {{-- {{ __('Notifications') }} --}}
                    {{-- </x-nav-link> --}}
                </div>
                @endif

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->nom }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
