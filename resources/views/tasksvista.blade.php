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
                    <h1 class="text-center text-7xl text-black">Tus Tareas</h1>
                    <br>

                   
                    <x-tasks :tasks="$tasks"></x-tasks>
                    <div class="flex justify-end ml-4">
  <x-modal-new-task :tasks="$tasks" :users="$users ?? collect()" :projects="$projects ?? collect()" />
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
