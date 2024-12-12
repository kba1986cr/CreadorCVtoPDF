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

                        <!-- Enlaces Profesionales (Opcional) -->
                        <div>
                            <label for="professional_links" class="block mb-1 text-sm font-medium">Enlaces Profesionales (Opcional)</label>
                            <input type="url" id="professional_links" name="professional_links"
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="LinkedIn, Portafolio, Sitio Web...">
                        </div>
                    </section>

                    <!-- 2. Objetivo Profesional o Perfil Profesional -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Objetivo Profesional / Perfil Profesional</h2>
                        
                        <!-- Objetivo Profesional -->
                        <div>
                            <label for="professional_objective" class="block mb-1 text-sm font-medium">Objetivo Profesional</label>
                            <textarea id="professional_objective" name="professional_objective" rows="3" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Describe tus metas profesionales y cómo puedes contribuir a la empresa..."></textarea>
                        </div>

                        <!-- Perfil Profesional -->
                        <div>
                            <label for="professional_profile" class="block mb-1 text-sm font-medium">Perfil Profesional</label>
                            <textarea id="professional_profile" name="professional_profile" rows="4" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Resumen de habilidades, experiencias y logros más relevantes..."></textarea>
                        </div>
                    </section>

                    <!-- 3. Experiencia Laboral -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Experiencia Laboral</h2>
                        
                        <!-- Repite este bloque para cada experiencia laboral -->
                        <div class="space-y-4">
                            <div class="border p-4 rounded-md">
                                <h3 class="text-md font-medium mb-2">Experiencia #1</h3>

                                <!-- Nombre de la Empresa -->
                                <div>
                                    <label for="company_name[]" class="block mb-1 text-sm font-medium">Nombre de la Empresa</label>
                                    <input type="text" id="company_name[]" name="company_name[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Nombre de la Empresa">
                                </div>

                                <!-- Puesto Desempeñado -->
                                <div>
                                    <label for="position[]" class="block mb-1 text-sm font-medium">Puesto Desempeñado</label>
                                    <input type="text" id="position[]" name="position[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Título del Puesto">
                                </div>

                                <!-- Fecha de Inicio y Fin -->
                                <div class="flex space-x-4">
                                    <div class="w-1/2">
                                        <label for="start_date[]" class="block mb-1 text-sm font-medium">Fecha de Inicio</label>
                                        <input type="month" id="start_date[]" name="start_date[]" required
                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                    <div class="w-1/2">
                                        <label for="end_date[]" class="block mb-1 text-sm font-medium">Fecha de Fin</label>
                                        <input type="month" id="end_date[]" name="end_date[]" required
                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                </div>

                                <!-- Descripción de Responsabilidades y Logros -->
                                <div>
                                    <label for="responsibilities[]" class="block mb-1 text-sm font-medium">Descripción de Responsabilidades y Logros</label>
                                    <textarea id="responsibilities[]" name="responsibilities[]" rows="3" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Detalle tus funciones y logros cuantificables..."></textarea>
                                </div>
                            </div>
                            <!-- Puedes añadir más experiencias laborales duplicando el bloque anterior -->
                        </div>
                    </section>

                    <!-- 4. Educación -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Educación</h2>
                        
                        <!-- Repite este bloque para cada educación -->
                        <div class="space-y-4">
                            <div class="border p-4 rounded-md">
                                <h3 class="text-md font-medium mb-2">Educación #1</h3>

                                <!-- Nombre de la Institución -->
                                <div>
                                    <label for="institution_name[]" class="block mb-1 text-sm font-medium">Nombre de la Institución</label>
                                    <input type="text" id="institution_name[]" name="institution_name[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Nombre de la Universidad o Instituto">
                                </div>

                                <!-- Título Obtenido -->
                                <div>
                                    <label for="degree[]" class="block mb-1 text-sm font-medium">Título Obtenido</label>
                                    <input type="text" id="degree[]" name="degree[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Licenciatura, Ingeniería, etc.">
                                </div>

                                <!-- Fecha de Inicio y Fin -->
                                <div class="flex space-x-4">
                                    <div class="w-1/2">
                                        <label for="edu_start_date[]" class="block mb-1 text-sm font-medium">Fecha de Inicio</label>
                                        <input type="month" id="edu_start_date[]" name="edu_start_date[]" required
                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                    <div class="w-1/2">
                                        <label for="edu_end_date[]" class="block mb-1 text-sm font-medium">Fecha de Fin</label>
                                        <input type="month" id="edu_end_date[]" name="edu_end_date[]" required
                                            class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                </div>

                                <!-- Notas Relevantes -->
                                <div>
                                    <label for="edu_notes[]" class="block mb-1 text-sm font-medium">Notas Relevantes</label>
                                    <textarea id="edu_notes[]" name="edu_notes[]" rows="2"
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Promedio, honores, proyectos destacados..."></textarea>
                                </div>
                            </div>
                            <!-- Puedes añadir más educación duplicando el bloque anterior -->
                        </div>
                    </section>

                    <!-- 5. Habilidades -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Habilidades</h2>
                        
                        <!-- Habilidades Técnicas -->
                        <div>
                            <label for="technical_skills" class="block mb-1 text-sm font-medium">Habilidades Técnicas</label>
                            <textarea id="technical_skills" name="technical_skills" rows="3" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Software, herramientas, lenguajes de programación..."></textarea>
                        </div>

                        <!-- Habilidades Blandas -->
                        <div>
                            <label for="soft_skills" class="block mb-1 text-sm font-medium">Habilidades Blandas</label>
                            <textarea id="soft_skills" name="soft_skills" rows="3" required
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Comunicación, trabajo en equipo, liderazgo..."></textarea>
                        </div>
                    </section>

                    <!-- 6. Idiomas -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Idiomas</h2>
                        
                        <!-- Repite este bloque para cada idioma -->
                        <div class="space-y-4">
                            <div class="border p-4 rounded-md">
                                <h3 class="text-md font-medium mb-2">Idioma #1</h3>

                                <!-- Nombre del Idioma -->
                                <div>
                                    <label for="language[]" class="block mb-1 text-sm font-medium">Idioma</label>
                                    <input type="text" id="language[]" name="language[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Ejemplo: Inglés">
                                </div>

                                <!-- Nivel de Dominio -->
                                <div>
                                    <label for="language_level[]" class="block mb-1 text-sm font-medium">Nivel de Dominio</label>
                                    <select id="language_level[]" name="language_level[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                        <option value="">Selecciona el nivel</option>
                                        <option value="Básico">Básico</option>
                                        <option value="Intermedio">Intermedio</option>
                                        <option value="Avanzado">Avanzado</option>
                                        <option value="Nativo">Nativo</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Puedes añadir más idiomas duplicando el bloque anterior -->
                        </div>
                    </section>

                    <!-- 7. Certificaciones y Cursos -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Certificaciones y Cursos</h2>
                        
                        <!-- Repite este bloque para cada certificación o curso -->
                        <div class="space-y-4">
                            <div class="border p-4 rounded-md">
                                <h3 class="text-md font-medium mb-2">Certificación/Curso #1</h3>

                                <!-- Nombre de la Certificación o Curso -->
                                <div>
                                    <label for="certification_name[]" class="block mb-1 text-sm font-medium">Nombre de la Certificación o Curso</label>
                                    <input type="text" id="certification_name[]" name="certification_name[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Título completo">
                                </div>

                                <!-- Institución que lo Otorgó -->
                                <div>
                                    <label for="issuing_institution[]" class="block mb-1 text-sm font-medium">Institución que lo Otorgó</label>
                                    <input type="text" id="issuing_institution[]" name="issuing_institution[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Nombre de la Universidad o Plataforma">
                                </div>

                                <!-- Fecha de Obtención -->
                                <div>
                                    <label for="certification_date[]" class="block mb-1 text-sm font-medium">Fecha de Obtención</label>
                                    <input type="month" id="certification_date[]" name="certification_date[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                </div>
                            </div>
                            <!-- Puedes añadir más certificaciones duplicando el bloque anterior -->
                        </div>
                    </section>

                    <!-- 8. Proyectos (Opcional) -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Proyectos (Opcional)</h2>
                        
                        <!-- Repite este bloque para cada proyecto -->
                        <div class="space-y-4">
                            <div class="border p-4 rounded-md">
                                <h3 class="text-md font-medium mb-2">Proyecto #1</h3>

                                <!-- Nombre del Proyecto -->
                                <div>
                                    <label for="project_name[]" class="block mb-1 text-sm font-medium">Nombre del Proyecto</label>
                                    <input type="text" id="project_name[]" name="project_name[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Título descriptivo">
                                </div>

                                <!-- Descripción -->
                                <div>
                                    <label for="project_description[]" class="block mb-1 text-sm font-medium">Descripción</label>
                                    <textarea id="project_description[]" name="project_description[]" rows="3" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Breve explicación del proyecto, tu rol y las tecnologías utilizadas..."></textarea>
                                </div>

                                <!-- Resultados -->
                                <div>
                                    <label for="project_results[]" class="block mb-1 text-sm font-medium">Resultados</label>
                                    <textarea id="project_results[]" name="project_results[]" rows="2" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Impacto o logros alcanzados..."></textarea>
                                </div>
                            </div>
                            <!-- Puedes añadir más proyectos duplicando el bloque anterior -->
                        </div>
                    </section>

                    <!-- 9. Logros y Reconocimientos (Opcional) -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Logros y Reconocimientos (Opcional)</h2>
                        
                        <!-- Repite este bloque para cada logro o reconocimiento -->
                        <div class="space-y-4">
                            <div class="border p-4 rounded-md">
                                <h3 class="text-md font-medium mb-2">Logro/Reconocimiento #1</h3>

                                <!-- Tipo -->
                                <div>
                                    <label for="achievement_type[]" class="block mb-1 text-sm font-medium">Tipo</label>
                                    <select id="achievement_type[]" name="achievement_type[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                        <option value="">Selecciona el tipo</option>
                                        <option value="Premio">Premio</option>
                                        <option value="Reconocimiento">Reconocimiento</option>
                                        <option value="Distinción">Distinción</option>
                                        <!-- Añade más opciones si es necesario -->
                                    </select>
                                </div>

                                <!-- Detalles -->
                                <div>
                                    <label for="achievement_details[]" class="block mb-1 text-sm font-medium">Detalles</label>
                                    <textarea id="achievement_details[]" name="achievement_details[]" rows="2" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Detalles del premio o reconocimiento..."></textarea>
                                </div>
                            </div>
                            <!-- Puedes añadir más logros duplicando el bloque anterior -->
                        </div>
                    </section>

                    <!-- 10. Referencias (Opcional) -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Referencias (Opcional)</h2>
                        
                        <!-- Repite este bloque para cada referencia -->
                        <div class="space-y-4">
                            <div class="border p-4 rounded-md">
                                <h3 class="text-md font-medium mb-2">Referencia #1</h3>

                                <!-- Nombre de la Referencia -->
                                <div>
                                    <label for="reference_name[]" class="block mb-1 text-sm font-medium">Nombre de la Referencia</label>
                                    <input type="text" id="reference_name[]" name="reference_name[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Nombre Completo">
                                </div>

                                <!-- Cargo y Empresa -->
                                <div>
                                    <label for="reference_position[]" class="block mb-1 text-sm font-medium">Cargo y Empresa</label>
                                    <input type="text" id="reference_position[]" name="reference_position[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Posición y Nombre de la Empresa">
                                </div>

                                <!-- Información de Contacto -->
                                <div>
                                    <label for="reference_contact[]" class="block mb-1 text-sm font-medium">Información de Contacto</label>
                                    <input type="text" id="reference_contact[]" name="reference_contact[]" required
                                        class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                        placeholder="Teléfono o Correo Electrónico">
                                </div>
                            </div>
                            <!-- Puedes añadir más referencias duplicando el bloque anterior -->
                        </div>
                    </section>

                    <!-- 11. Información Adicional (Opcional) -->
                    <section>
                        <h2 class="text-lg font-semibold mb-4">Información Adicional (Opcional)</h2>
                        
                        <!-- Voluntariado -->
                        <div>
                            <label for="volunteer_experience" class="block mb-1 text-sm font-medium">Voluntariado</label>
                            <textarea id="volunteer_experience" name="volunteer_experience" rows="3"
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Experiencias de voluntariado relevantes..."></textarea>
                        </div>

                        <!-- Afiliaciones Profesionales -->
                        <div>
                            <label for="professional_affiliations" class="block mb-1 text-sm font-medium">Afiliaciones Profesionales</label>
                            <textarea id="professional_affiliations" name="professional_affiliations" rows="2"
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Membresías en asociaciones o colegios profesionales..."></textarea>
                        </div>

                        <!-- Intereses Personales -->
                        <div>
                            <label for="personal_interests" class="block mb-1 text-sm font-medium">Intereses Personales</label>
                            <textarea id="personal_interests" name="personal_interests" rows="2"
                                class="block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                                placeholder="Intereses personales relevantes para el puesto..."></textarea>
                        </div>
                    </section>

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
