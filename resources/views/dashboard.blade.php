<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-gray-100 dark:bg-gray-600 shadow rounded-lg px-4 py-6 sm:px-6 lg:px-8 border border-gray-200 dark:border-gray-300">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Registra, edita, mira y exporta... ¡Tú decides!') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 bg-gradient-to-t from-sky-400 to-gray-300 dark:bg-gradient-to-t dark:from-sky-600 dark:to-gray-800">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex flex-col items-center">
                            <a href="{{ route('cv.create') }}" class="btn-create-cv">Registrar Datos</a>
                            @if (isset($cv))
                                <button class="btn-view-cv" data-bs-toggle="modal" data-bs-target="#exampleModalView">Ver CV</button>
                            @endif

                            {{-- <a href="{{ route('cv.show') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" >
                                Registrar Datos
                            </a> --}}

                            <!-- Botón para abrir el modal de visualización de datos -->
                            @if (isset($cv))
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase mt-4 transition duration-150 ease-in-out border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalView">
                                    Ver CV
                                </button>
                            @endif

                            <!-- Modal para Ver CV -->
                            <div class="modal fade" id="exampleModalView" tabindex="-1"
                                aria-labelledby="exampleModalViewLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div
                                        class="modal-content border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                        <div class="modal-header border-b border-gray-200 dark:border-gray-700">
                                            <h1 class="modal-title fs-5 font-semibold" id="exampleModalViewLabel">CV
                                                Registrado</h1>
                                            <button type="button" class="btn-close dark:invert" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <!-- Contenido del modal (Visualización de datos) -->
                                            @if (isset($cv))
                                                <div class="space-y-2">
                                                    <h1 class="text-lg font-bold">{{ $cv->full_name }}</h1>
                                                    <p><strong>Contacto:</strong> {{ $cv->contact_info }}</p>
                                                    <p><strong>Educación:</strong> {{ $cv->education }}</p>
                                                    <p><strong>Experiencia Laboral:</strong> {{ $cv->work_experience }}
                                                    </p>
                                                    <p><strong>Habilidades:</strong> {{ $cv->skills }}</p>
                                                    <p><strong>Idiomas:</strong> {{ $cv->languages }}</p>
                                                </div>

                                                <div class="mt-4">
                                                    <a href="{{ route('cv.pdf', $cv) }}"
                                                        class="btn btn-primary bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                                        Descargar CV en PDF
                                                    </a>
                                                </div>
                                            @else
                                                <p>No se ha registrado ningún CV aún.</p>
                                            @endif
                                            <!-- Fin del contenido del modal -->
                                        </div>
                                        <div class="modal-footer border-t border-gray-200 dark:border-gray-700">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
