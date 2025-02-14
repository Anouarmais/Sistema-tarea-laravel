<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white py-10">

    <div x-data="{ open: false, task: {} }">
        @props(['tasks' , 'users' , 'projects'])

        @if ($tasks && $tasks->isNotEmpty())
            <div class="container mx-auto px-4">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border border-gray-300">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="py-3 px-4">Proyecto</th>
                                <th class="py-3 px-4">Tarea</th>
                                <th class="py-3 px-4">Descripción</th>
                                <th class="py-3 px-4">Estado</th>
                                <th class="py-3 px-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="border-b text-center">
                                    <td class="py-3 px-4 bg-gray-100">{{ $task->project->name ?? 'Sin Proyecto' }}</td>
                                    <td class="py-3 px-4">{{ $task->name }}</td>
                                    <td class="py-3 px-4 bg-gray-100">{{ $task->description }}</td>
                                    <td class="py-3 px-4">{{ $task->status }}</td>
                                    <td class="py-3 px-4 bg-gray-100">
                                        <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-400">✓</button>
                                        <button 
                                            class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-400"
                                            @click="open = true; task = { id: '{{ $task->id }}', name: '{{ $task->name }}', description: '{{ $task->description }}', status: '{{ $task->status }}' }"
                                        >✏️</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Modal de Edición -->
        <div x-show="open" class=" fixed inset-0 z-50  flex justify-center items-center bg-gray-900 bg-opacity-50" x-cloak>
            <div class="bg-white p-6 rounded-lg w-1/3">
                <h2 class="text-xl font-semibold mb-4">Editar Tarea</h2>

                <!-- Formulario -->
                <form method="POST" action="{{ route('task.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Input oculto para el ID de la tarea -->
                    <input type="hidden" name="id" x-model="task.id">

                    <!-- Nombre de la tarea -->
                    <label class="block mb-2">Nombre</label>
                    <input type="text" name="name" x-model="task.name" class="w-full border p-2 rounded mb-4">

                    <!-- Descripción -->
                    <label class="block mb-2">Descripción</label>
                    <textarea name="description" x-model="task.description" class="w-full border p-2 rounded mb-4"></textarea>

                    <!-- Estado -->
                    <label class="block mb-2">Estado</label>
                    <select name="status" x-model="task.status" class="w-full border p-2 rounded mb-4">
                        <option value="pendiente">Pendiente</option>
                        <option value="en proceso">En proceso</option>
                        <option value="completada">Completada</option>
                    </select>

                    <!-- Botones -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" class="px-4 py-2 bg-gray-400 rounded text-white" @click="open = false">Cancelar</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 rounded text-white">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
