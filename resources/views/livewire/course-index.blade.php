<div>
    <div class="bg-gray-200 py-4">

        {{-- FILTROS DE CURSOS --}}
        <div class="container flex space-x-4 mb-16">
            <button
                class="border border-gray-300 rounded-xl text-info h-12 px-5 bg-white hover:border-gray-400 focus:outline-none appearance-none"><i
                    class="fas fa-layer-group mr-2"></i>Todos
                los
                cursos</button>

            {{-- Dropdown --}}
            <div class="relative inline-flex">

                <select
                    class="border border-gray-300 rounded-xl text-info h-12 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option><i class="fas fa-tags mr-2"></i> Categorías</option>

                </select>
            </div>

            <div class="relative inline-flex">

                <select
                    class="border border-gray-300 rounded-xl text-info h-12 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option><i class="fas fa-glasses mr-2"></i>Niveles</option>

                </select>
            </div>


        </div>
        {{-- FILTROS DE CURSOS --}}

        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-8 pb-12">
            @foreach ($courses as $course)
                <article class="card">
                    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}"
                        alt="{{ $course->title }}">
                    <div class="px-6 py-4">
                        <h1 class="text-lg text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40, '...') }}
                        </h1>

                        {{-- nombre del profesro --}}
                        <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>

                        {{-- Estrellas del curso --}}
                        <div class="flex justify-between">
                            <ul class="flex text-sm space-x-1">
                                <li class=""><i
                                        class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400 text-yellow-400"></i>
                                </li>
                                <li class=""><i
                                        class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class=""><i
                                        class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class=""><i
                                        class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class=""><i
                                        class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                            </ul>

                            {{-- Alumnos matriculados --}}
                            <p class="text-sm text-gray-500"><i class="fas fa-users"></i>
                                ({{ $course->students_count }})</p>
                        </div>

                        <a href="{{ route('courses.show', $course) }}"
                            class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm py-2 px-4 rounded">
                            <i class="fas fa-plus-circle mr-2"></i>Más información
                        </a>


                    </div>
                </article>
            @endforeach
        </div>

        <div class="container my-4">
            {{ $courses->links() }}
        </div>

    </div>
</div>
