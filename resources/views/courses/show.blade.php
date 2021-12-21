<x-app-layout>
    {{-- hero --}}
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 md:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}"
                    alt="{{ $course->title }}">
            </figure>

            <div class="text-white">
                <h1 class="text-4xl"> {{ $course->title }} </h1>
                <h2 class="text-xl mb-3"> {{ $course->subtitle }} </h2>

                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Estudiantes: {{ $course->students_count }}
                </p>
                <p class="mb-2"><i class="fas fa-star"></i> Calificación: {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    {{-- Contenido del curso --}}
    <div class="container grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="lg:col-span-2 md:oreder-1 order-2">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Metas del curso</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base">
                                <i class="far fa-check-circle text-info mr-2"></i> {{ $goal->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario del curso</h1>
                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" @if ($loop->first)
                        x-data="{ open: true }"
                    @else
                        x-data="{ open: false }"
                @endif>
                <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                    <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                </header>

                <div class="bg-white py-2 px-4" x-show="open">
                    <ul class="space-y-2">
                        @foreach ($section->lessons as $lesson)
                            <li class="text-gray-700 text-base">
                                <i class="fas fa-play-circle mr-2 text-info"></i>{{ $lesson->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                </article>
                @endforeach
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Requisitos del curso</h1>
                <ul class="list-disc list-inside space-y-2">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl">Descripción</h1>

                <div class="text-base text-gray-700 mb-2">
                    {{ $course->description }}
                </div>
            </section>
        </div>

        <div class="order-1 md:order-2">
            <section class="card mb-6">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="rounded-full h-12 w-12 object-cover shadow-xl"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-semibold text-gray-500 text-xl">Prof. {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>
                    {{-- Matriculación al curso --}}

                    @can('enrolled', $course)
                        <a href="{{ route('courses.status', $course) }}" class="btn btn-info btn-block mt-4">Continuar
                            con
                            el curso</a>
                    @else
                        <form action="{{ route('courses.enrolled', $course) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-info btn-block mt-4">Llevar este curso</button>
                        </form>
                    @endcan
                </div>
            </section>

            <aside class="hidden md:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-12">
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}"
                            alt="{{ $similar->title }}">
                        <div class="ml-3">
                            <h1><a class="font-bold text-gray-500 mb-3"
                                    href="{{ route('courses.show', $similar) }}">{{ Str::limit($similar->title, 40, '...') }}</a>
                            </h1>

                            <div class="flex items-center my-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                    src="{{ $similar->teacher->profile_photo_url }}"
                                    alt="{{ $similar->teacher->name }}">
                                <p class="text-gray-700 text-sm ml-2">{{ $similar->teacher->name }}</p>
                            </div>

                            <p class="text-sm">
                                <i class="fa fa-star mr-2 text-yellow-400"></i>{{ $similar->rating }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>
