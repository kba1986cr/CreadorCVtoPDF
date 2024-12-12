<x-app-layout>
    <div class="modal-body p-4">
        <!-- Contenido del modal (Formulario) -->
        <div class="max-w-5xl mx-auto">
            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-md">
                <form action="{{ route('cv.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- 1. Datos Personales -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Datos Personales</h2>
                        
                        <!-- Nombre Completo -->
                        <div>
                            <label for="full_name" class="block mb-1 text-sm font-medium">Nombre Completo</label>
                            <input type="text" id="full_name" name="full_name" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Ejemplo: Juan Pérez">
                        </div>

                        <!-- Dirección -->
                        <div>
                            <label for="address" class="block mb-1 text-sm font-medium">Dirección</label>
                            <input type="text" id="address" name="address" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Ciudad, País">
                        </div>

                        <!-- Número de Teléfono -->
                        <div>
                            <label for="phone" class="block mb-1 text-sm font-medium">Número de Teléfono</label>
                            <input type="tel" id="phone" name="phone" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="+123 456 7890">
                        </div>

                        <!-- Correo Electrónico -->
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium">Correo Electrónico</label>
                            <input type="email" id="email" name="email" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="nombre@ejemplo.com">
                        </div>


                    <!-- Botón de Envío -->
                    <div class="pt-6 flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 text-sm font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-green-600 hover:bg-green-700 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Crear CV
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin del contenido del modal -->
    </div>
</x-app-layout>
