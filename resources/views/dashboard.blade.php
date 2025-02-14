<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
            <h1 class="textxl-3xl text-purple-800">Tus Tareas</h1>
<br>

<p>Pertenece a: {{ Auth::user()->projects->find(1)?->name ?? 'Proyecto no encontrado' }}</p>

<h2 class="text-lg font-semibold mt-4">Lista de Tareas</h2>

@if ($tasks->isNotEmpty())
    <ul class="list-disc pl-5">
        @foreach ($tasks as $task)
            <li>
                <strong>Nombre:</strong> {{ $task->name }} <br>
                <strong>Descripción:</strong> {{ $task->description }} <br>
                <strong>Estado:</strong> {{ $task->status }}
            </li>
        @endforeach
    </ul>
@else
    <p>No hay tareas para este proyecto.</p>
@endif

</div>

            </div>
        </div>
    </div>
</x-app-layout>
