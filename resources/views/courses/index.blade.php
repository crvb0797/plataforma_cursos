<x-app-layout>
    {{-- HERO --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/banner_cursos.jpg') }})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2 space-y-4">
                <h1 class="text-white font-bold text-4xl">Los mejores cursos de programación ¡GRATIS! y en español</h1>
                <p class="text-white text-lg">Si estás buscando potenciar tus conocimientos de programación, has llegado
                    al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso</p>

                <!-- search -->
                @livewire('search')
            </div>
        </div>
    </section>
    {{-- /HERO --}}

    {{-- FILTRADO DE CURSOS Y LISTADO DE TODOS LOS CURSOS PUBLICADOS --}}
    @livewire('course-index')
    {{-- /FILTRADO DE CURSOS Y LISTADO DE TODOS LOS CURSOS PUBLICADOS --}}
</x-app-layout>
