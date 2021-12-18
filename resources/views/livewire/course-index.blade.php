<div>
    {{-- FILTROS DE CURSOS --}}
    <div class="bg-gray-200 py-4 mb-12">
        <div class="container flex space-x-4">
            <button wire:click="resetFilters"
                class="border border-gray-300 rounded-xl text-info h-12 px-5 bg-white hover:border-gray-400 focus:outline-none appearance-none"><i
                    class="fas fa-layer-group mr-2"></i>Todos
                los
                cursos
            </button>

            {{-- Dropdown categorias --}}
            <div class="relative inline-flex" x-data="{ open: false }">
                <!-- Dropdown categorias-->
                <div class="relative">
                    <button x-on:click="open = !open"
                        class="border border-gray-300 rounded-xl text-info h-12 px-5 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <i class="fas fa-tags mr-2"></i> Categorías <i class="ml-2 text-sm fas fa-angle-down"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute right-50 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                        x-on:click.away="open = false">
                        @foreach ($categories as $category)
                            <a wire:click="$set('category_id', {{ $category->id }})" x-on:click="open = false"
                                class="transition-colors cursor-pointer duration-200 block px-4 py-2 text-normal text-info rounded hover:bg-gray-500 hover:text-white">{{ $category->name }}</a>
                        @endforeach

                    </div>
                    <!-- // Dropdown Body -->
                </div>
                <!-- // Dropdown -->
            </div>

            <!-- Dropdown niveles-->
            <div class="relative inline-flex" x-data="{ open: false }">
                <div class="relative">
                    <button x-on:click="open = !open"
                        class="border border-gray-300 rounded-xl text-info h-12 px-5 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <i class="fas fa-glasses mr-2"></i> Niveles <i class="ml-2 text-sm fas fa-angle-down"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute right-50 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                        x-on:click.away="open = false">
                        @foreach ($levels as $level)
                            <a wire:click="$set('level_id', {{ $level->id }})" x-on:click="open = false"
                                class="transition-colors cursor-pointer duration-200 block px-4 py-2 text-normal text-info rounded hover:bg-gray-500 hover:text-white">{{ $level->name }}</a>
                        @endforeach

                    </div>
                    <!-- // Dropdown Body -->
                </div>
                <!-- // Dropdown -->
            </div>
        </div>
        {{-- /FILTROS DE CURSOS --}}
    </div>

    {{-- CURSOS --}}
    <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-8 pb-4">
        @foreach ($courses as $course)
            <x-card :course="$course" />
        @endforeach
    </div>

    <div class="container py-4">
        {{ $courses->links() }}
    </div>
</div>
