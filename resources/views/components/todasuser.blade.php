<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white py-10">

<div x-data="taskManager()">

        @props(['tasks' , 'users' , 'projects'])

        @if ($tasks && $tasks->isNotEmpty())
            <div class="container mx-auto px-4">
                <div class="overflow-x-auto">
                <table class="table-auto w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200 text-center">
            <th class="py-3 px-4 w-[200px]">Proyecto</th>
            <th class="py-3 px-4 w-[200px]">Tarea</th>
            <th class="py-3 px-4 w-[200px]">Asignado a</th>
            <th class="py-3 px-4 w-[300px]">Descripción</th> 
            <th class="py-3 px-4 w-[150px]">Estado</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tasks as $task)
            <tr class="border-b text-center">
            <td class="py-3 px-4 bg-gray-100 break-words w-[200px]">{{ $task->project->name ?? 'Sin Proyecto' }}</td>
<td class="py-3 px-4 break-words w-[200px]">{{ $task->name }}</td>
<td class="py-3 px-4 bg-gray-100 break-words w-[200px]">{{ $task->admin->name ?? 'Sin asignar' }}</td>
<td class="py-3 px-4 break-words w-[300px]">{{ $task->description }}</td>
<td class="py-3 px-4 bg-gray-100 break-words w-[150px]">{{ $task->status }}</td>


            </tr>
        @endforeach
    </tbody>
</table>

                </div>
            </div>
        @endif

        


</body>
</html>
