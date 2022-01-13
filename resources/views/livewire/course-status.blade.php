<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        {{-- CONTENIDO DEL CURSO --}}
        <div class="col-span-2">
            {!! $current->iframe !!}
            {{ $current->name }}
            {{ $current->id }}
            <p>Indice: {{ $index }}</p>
            {{-- <p>Anterior: {{ $previous->id }}</p> --}}
            <p>Siguiente: {{ $next->id }}</p>
        </div>

        {{-- SECCIONES Y LECCIONES DEL CURSO --}}
        <div class="card">
            <div class="card-body">
                <h1>{{ $course->title }}</h1>
                {{-- INFORMACION DEL PROFESOR --}}
                <div class="flex items-center">
                    <figure>
                        <img src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                    </figure>
                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>

                {{-- SECCIONES Y LECCIONES DEL CURSO --}}
                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a class="font-bold">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a class="cursor-pointer"
                                            wire:click="changeLesson({{ $lesson }})">{{ $lesson->id }}
                                            @if ($lesson->completed)
                                                (Completado)
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
