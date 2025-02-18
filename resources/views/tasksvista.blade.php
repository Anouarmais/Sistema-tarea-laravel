<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center text-7xl text-black">Lista de tareas</h1>
                    <br>

                   
                    <x-tasks :tasks="$tasks" :users="$users"></x-tasks>
                    <div class="flex justify-end ml-4">
  <x-modal-new-task :tasks="$tasks" :users="$users ?? collect()" :projects="$projects ?? collect()" />
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
