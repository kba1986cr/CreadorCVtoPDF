<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar CV
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Editar CV</h2>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('cv.update', $cv) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo para Nombre Completo -->
                    <div class="mb-4">
                        <label for="full_name" class="block text-gray-700 dark:text-gray-300">Nombre Completo:</label>
                        <input type="text" id="full_name" name="full_name"
                            value="{{ old('full_name', $cv->full_name) }}"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 dark:bg-gray-700 dark:text-white">
                        @error('full_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Información de Contacto -->
                    <div class="mb-4">
                        <label for="contact_info" class="block text-gray-700 dark:text-gray-300">Información de Contacto:</label>
                        <textarea id="contact_info" name="contact_info" required
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 dark:bg-gray-700 dark:text-white">{{ old('contact_info', $cv->contact_info) }}</textarea>
                        @error('contact_info')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Educación -->
                    <div class="mb-4">
                        <label for="education" class="block text-gray-700 dark:text-gray-300">Educación:</label>
                        <textarea id="education" name="education" required
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 dark:bg-gray-700 dark:text-white">{{ old('education', $cv->education) }}</textarea>
                        @error('education')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Experiencia Laboral -->
                    <div class="mb-4">
                        <label for="work_experience" class="block text-gray-700 dark:text-gray-300">Experiencia Laboral:</label>
                        <textarea id="work_experience" name="work_experience" required
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 dark:bg-gray-700 dark:text-white">{{ old('work_experience', $cv->work_experience) }}</textarea>
                        @error('work_experience')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Habilidades -->
                    <div class="mb-4">
                        <label for="skills" class="block text-gray-700 dark:text-gray-300">Habilidades:</label>
                        <textarea id="skills" name="skills" required
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 dark:bg-gray-700 dark:text-white">{{ old('skills', $cv->skills) }}</textarea>
                        @error('skills')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Idiomas -->
                    <div class="mb-4">
                        <label for="languages" class="block text-gray-700 dark:text-gray-300">Idiomas:</label>
                        <textarea id="languages" name="languages" required
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 dark:bg-gray-700 dark:text-white">{{ old('languages', $cv->languages) }}</textarea>
                        @error('languages')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botón de Envío -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                            Actualizar CV
                        </button>
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
