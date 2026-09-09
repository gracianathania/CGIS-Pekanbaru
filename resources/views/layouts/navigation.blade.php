<nav x-data="{ open: false }" class="sticky top-0 z-[9999] w-full bg-[#f9b244] shadow-md border-b border-amber-300/40 font-sans">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center w-full justify-between sm:justify-start">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="logo-container flex items-center bg-white rounded-full px-4 py-1.5 shadow-sm border-2 border-amber-400">
                            <img src="{{ asset('images/logo_C-GIS.png') }}" alt="Logo" class="h-8 w-auto mr-2" />
                            <span class="logo-text font-bold text-lg text-amber-600">C-GIS</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-semibold text-gray-800 hover:text-amber-800">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('klinik.index')" :active="request()->routeIs('klinik.index')" class="text-sm font-semibold text-gray-800 hover:text-amber-800">
                        {{ __('Explore') }}
                    </x-nav-link>
                    <x-nav-link :href="route('map')" :active="request()->routeIs('map')" class="text-sm font-semibold text-gray-800 hover:text-amber-800">
                        {{ __('Map') }}
                    </x-nav-link>
                    <x-nav-link :href="route('artikel')" :active="request()->routeIs('artikel')" class="text-sm font-semibold text-gray-800 hover:text-amber-800">
                        {{ __('Artikel') }}
                    </x-nav-link>
                    <x-nav-link :href="route('event')" :active="request()->routeIs('event')" class="text-sm font-semibold text-gray-800 hover:text-amber-800">
                        {{ __('Event') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-amber-900 hover:text-gray-900 hover:bg-amber-300 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-amber-400/95 backdrop-blur-md border-t border-amber-300">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('klinik.index')" :active="request()->routeIs('klinik.index')">
                {{ __('Explore') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('map')" :active="request()->routeIs('map')">
                {{ __('Map') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('artikel')" :active="request()->routeIs('artikel')">
                {{ __('Artikel') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('event')" :active="request()->routeIs('event')">
                {{ __('Event') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>