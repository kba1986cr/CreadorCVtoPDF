<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div
                class="py-12 bg-gradient-to-t from-sky-400 to-gray-300 dark:bg-gradient-to-t dark:from-sky-600 dark:to-gray-800">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-col items-center">
                        <!-- Botón para abrir el modal de creación -->
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500"
                            data-bs-toggle="modal" data-bs-target="#exampleModalCreate">
                            Registrar Datos
                        </button>

                        <!-- Modal para Crear CV -->
                        <div class="modal fade" id="exampleModalCreate" tabindex="-1"
                            aria-labelledby="exampleModalCreateLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div
                                    class="modal-content bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 rounded-lg shadow-lg border-0">
                                    <div class="modal-header border-b border-gray-200 dark:border-gray-700">
                                        <h1 class="modal-title fs-5 font-semibold" id="exampleModalCreateLabel">Registro
                                        </h1>
                                        <button type="button" class="btn-close dark:invert" data-bs-dismiss="modal"
                                            aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <!-- Contenido del modal (Formulario) -->
                                        <div class="max-w-3xl mx-auto">
                                            <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded-md">
                                                <form action="{{ route('cv.store') }}" method="POST" class="space-y-4">
                                                    @csrf

                                                    {{-- Campo Nombre Completo --}}
                                                    <div>
                                                        <label for="full_name"
                                                            class="block mb-1 text-sm font-medium">Nombre
                                                            Completo</label>
                                                        <input type="text" id="full_name" name="full_name" required
                                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                                            placeholder="Ejemplo: Juan Pérez">
                                                    </div>

                                                    {{-- Campo Información de Contacto --}}
                                                    <div>
                                                        <label for="contact_info"
                                                            class="block mb-1 text-sm font-medium">Información de
                                                            Contacto</label>
                                                        <textarea id="contact_info" name="contact_info" required
                                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                                            placeholder="Correo, teléfono, dirección..."></textarea>
                                                    </div>

                                                    {{-- Campo Educación --}}
                                                    <div>
                                                        <label for="education"
                                                            class="block mb-1 text-sm font-medium">Educación</label>
                                                        <textarea id="education" name="education" required
                                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                                            placeholder="Instituciones, títulos y fechas..."></textarea>
                                                    </div>

                                                    {{-- Campo Experiencia Laboral --}}
                                                    <div>
                                                        <label for="work_experience"
                                                            class="block mb-1 text-sm font-medium">Experiencia
                                                            Laboral</label>
                                                        <textarea id="work_experience" name="work_experience" required
                                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                                            placeholder="Cargos, empresas y periodos laborales..."></textarea>
                                                    </div>

                                                    {{-- Campo Habilidades --}}
                                                    <div>
                                                        <label for="skills"
                                                            class="block mb-1 text-sm font-medium">Habilidades</label>
                                                        <textarea id="skills" name="skills" required
                                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                                            placeholder="Lista de habilidades relevantes..."></textarea>
                                                    </div>

                                                    {{-- Campo Idiomas --}}
                                                    <div>
                                                        <label for="languages"
                                                            class="block mb-1 text-sm font-medium">Idiomas</label>
                                                        <textarea id="languages" name="languages" required
                                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                                            placeholder="Lista de idiomas y nivel de dominio..."></textarea>
                                                    </div>

                                                    {{-- Botón de Envío --}}
                                                    <div class="pt-4 flex justify-end">
                                                        <button type="submit"
                                                            class="inline-flex items-center px-4 py-2 text-sm font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-green-600 hover:bg-green-700 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                                            Crear CV
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Fin del contenido del modal -->
                                    </div>
                                    <div class="modal-footer border-t border-gray-200 dark:border-gray-700">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                <p><strong>Experiencia Laboral:</strong> {{ $cv->work_experience }}</p>
                                                <p><strong>Habilidades:</strong> {{ $cv->skills }}</p>
                                                <p><strong>Idiomas:</strong> {{ $cv->languages }}</p>
                                            </div>

                                            <div class="mt-4 flex space-x-2">
                                                <!-- Botón para Descargar PDF -->
                                                <a href="{{ route('cv.pdf', $cv) }}"
                                                    class="btn btn-primary bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                                    Descargar CV en PDF
                                                </a>

                                                <!-- Botón para Editar -->
                                                <a href="{{ route('cv.edit', $cv) }}"
                                                    class="btn btn-secondary bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                    Editar CV
                                                </a>

                                                <!-- Botón para Eliminar -->
                                                <form action="{{ route('cv.destroy', $cv) }}" method="POST"
                                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este CV?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                        Eliminar CV
                                                    </button>
                                                </form>
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
        </h2>
    </x-slot>
</x-app-layout>
