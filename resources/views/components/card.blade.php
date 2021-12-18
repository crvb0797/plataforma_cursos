@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
    <div class="card-body">
        <h1 class="card-title">{{ Str::limit($course->title, 20, '...') }}
        </h1>

        {{-- nombre del profesro --}}
        <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>

        {{-- Nivel del curso --}}
        <p class="text-gray-500 text-sm mb-2">nivel: {{ $course->level->name }}</p>

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

        <a href="{{ route('courses.show', $course) }}" class="btn btn-block btn-primary mt-4">
            <i class="fas fa-plus-circle mr-2"></i>Más información
        </a>


    </div>
</article>
