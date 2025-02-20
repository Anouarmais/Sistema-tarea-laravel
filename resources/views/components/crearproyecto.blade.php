@props(['tasks' , 'users' , 'projects'])
<!-- Botón para abrir el modal -->
<button id="btnAbrirModal" class="bg-gray-200 text-black px-4 py-2 rounded hover:bg-green-600 flex items-center m-8 text-right" type="button">
    Crear Proyecto
</button>

<!-- Modal -->
<div id="modalProyecto" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-lg">

        
        <!-- Header del Modal -->
        <div class="flex items-center justify-between p-4 border-b border-gray-300">
            <h3 class="text-lg font-semibold text-gray-900">Create New Project</h3>
            <button id="btnCerrarModal" class="text-gray-400 hover:text-gray-900">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>

        <!-- Formulario -->
        <form class="p-4" action="{{ route('project.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <label for="nombreProyecto" class="block mb-2 text-sm font-medium text-gray-900">Project Name</label>
                    <input type="text" name="name" id="nombreProyecto" class="border border-gray-300 rounded-lg w-full p-2.5" placeholder="Project name" required>
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <label for="adminProyecto" class="block mb-2 text-sm font-medium text-gray-900">Admin</label>
                    <select id="adminProyecto" name="admin_id" class="border border-gray-300 rounded-lg w-full p-2.5">
                        <option value="" selected>Select admin</option>
                        @foreach ($users as $user)   
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-2">
                    <label for="descripcionProyecto" class="block mb-2 text-sm font-medium text-gray-900">Project Description</label>
                    <textarea id="descripcionProyecto" name="description" rows="4" class="border border-gray-300 rounded-lg w-full p-2.5" placeholder="Write project description here"></textarea>                    
                </div>
            </div>

            <button type="submit" class="bg-blue-700 text-white px-5 py-2.5 rounded-lg hover:bg-blue-800">
                <svg class="w-5 h-5 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Add new Project
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modalProyecto");
    const openModalBtn = document.getElementById("btnAbrirModal");
    const closeModalBtn = document.getElementById("btnCerrarModal");

    if (openModalBtn && modal && closeModalBtn) {
        openModalBtn.addEventListener("click", function () {
            console.log("Abrir modal");
            modal.classList.remove("opacity-0", "pointer-events-none");
        });

        closeModalBtn.addEventListener("click", function () {
            console.log("Cerrar modal");
            modal.classList.add("opacity-0", "pointer-events-none");
        });
    } else {
        console.error("Error: No se encontraron los elementos del modal.");
    }
});

</script>
