<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center font-semibold text-gray-900">
                    <a href="{{ route('teknisi.dashboard') }}">
                        FATH <span class="text-cyan-500">COMP</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="font-semibold" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link class="font-semibold" :href="route('admin.rekap.teknisi')" :active="request()->routeIs('admin.rekap.teknisi')">
                        {{ __('Rekap Teknisi') }}
                    </x-nav-link>

                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-5 cursor-pointer font-semibold" :active="request()->routeIs('admin.list.index')">
                                <span class="mb-5">{{ __('Service') }}</span>
                            </x-nav-link>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('category')">
                                {{ __('Kategori') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.list.index')">
                                {{ __('List Service') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-5 cursor-pointer font-semibold" :active="request()->routeIs('booking.index')">
                                <span class="mb-5">{{ __('Booking') }}</span>
                            </x-nav-link>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('booking.index')">
                                {{ __('Booking') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.testimonial.index')">
                                {{ __('Testimoni') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-5 cursor-pointer font-semibold" :active="request()->routeIs('payment.index')">
                                <span class="mb-5">{{ __('Pembayaran') }}</span>
                            </x-nav-link>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('type.index')">
                                {{ __('Tipe Bayar') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('payment.index')">
                                {{ __('Pembayaran') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-5 cursor-pointer font-semibold" :active="request()->routeIs('user.admin.index')">
                                <span class="mb-5">{{ __('Pengguna') }}</span>
                            </x-nav-link>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('user.admin.index')">
                                {{ __('Kelola Admin') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('user.teknisi.index')">
                                {{ __('Kelola Teknisi') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('user.customer.index')">
                                {{ __('Kelola Customer') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-semibold rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

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
            <div class="-me-2 flex items-center sm:hidden">
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
            <x-responsive-nav-link :href="route('admin.rekap.teknisi')" :active="request()->routeIs('admin.rekap.teknisi')">
                {{ __('Rekap Teknisi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('category')" :active="request()->routeIs('category')">
                {{ __('Kategori Service') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.list.index')" :active="request()->routeIs('admin.list.index')">
                {{ __('List Service') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('booking.index')" :active="request()->routeIs('booking.index')">
                {{ __('Booking') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.testimonial.index')" :active="request()->routeIs('admin.testimonial.index')">
                {{ __('Testimoni') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('type.index')" :active="request()->routeIs('type.index')">
                {{ __('Tipe Pembayaran') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('payment.index')" :active="request()->routeIs('payment.index')">
                {{ __('Pembayaran') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.admin.index')" :active="request()->routeIs('user.admin.index')">
                {{ __('Kelola Admin') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.teknisi.index')" :active="request()->routeIs('user.teknisi.index')">
                {{ __('Kelola Teknisi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.customer.index')" :active="request()->routeIs('user.customer.index')">
                {{ __('Kelola Customer') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
