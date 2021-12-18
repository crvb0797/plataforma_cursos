@php
$links = [
    [
        'name' => '<i class="fas fa-home mr-2"></i> Inicio',
        'route' => route('home'),
        'active' => request()->routeIs('home'),
    ],
    [
        'name' => '<i class="fas fa-laptop mr-2"></i> Cursos',
        'route' => route('courses.index'),
        'active' => request()->routeIs('courses.index'),
    ],
];
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">

    <!-- Navegación principal (desktop) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Logo y enlaces --}}
            <div class="flex">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Enlaces de navegación -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($links as $link)
                        <x-jet-nav-link class="text-gray-500" href="{{ $link['route'] }}" :active="$link['active']">
                            {!! $link['name'] !!}
                        </x-jet-nav-link>
                    @endforeach
                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Dropdown de configuraciones -->
                <div class="ml-3 relative">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">

                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif

                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <div class="hidden md:flex items-center space-x-3 ">
                            <a href="{{ route('login') }}"
                                class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Iniciar
                                Sesión</a>
                            <a href="{{ route('register') }}"
                                class="py-2 px-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-400 transition duration-300">Registrarse</a>
                        </div>
                    @endauth

                </div>
            </div>

            <!-- Hamburguesa -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <!-- Menu movil -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        {{-- Enlaces de navegación --}}
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($links as $link)
                <x-jet-responsive-nav-link href="{{ $link['route'] }}" :active="$link['active']">
                    {!! $link['name'] !!}
                </x-jet-responsive-nav-link>
            @endforeach
        </div>

        <!-- Responsive opciones de ajustes -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                {{-- Autenticación y manejo de la cuenta --}}
                <div class="mt-3 space-y-1">

                    <!-- Manejo de la cuenta -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                        :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                            :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Autenticación -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                                this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-jet-responsive-nav-link>
                    </form>
                </div>

            </div>
        @else
            <div class="py-1 border-t border-gray-200">
                <x-jet-responsive-nav-link href="{{ route('login') }}">
                    Iniciar sesión
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register') }}">
                    Registrarse
                </x-jet-responsive-nav-link>
            </div>
        @endauth
    </div>

</nav>
