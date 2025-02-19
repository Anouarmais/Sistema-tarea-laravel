<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="mt-10" >


<form method="GET" action="{{ route('filtro') }}" class="max-w-md mx-auto">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
        Search
    </label>
    
    <div class="relative flex items-center">
        <input type="search" name="query" id="default-search" 
            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            placeholder="Search..." value="{{ request('query') }}"  />

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ml-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Search
        </button>
    </div>
</form>


</div>
<div class="mt-5">
@props(['tasks' => collect()]) 

@if(request()->has('query')) 
    @if(count($tasks) > 0)
        <ul>
            @foreach($tasks as $task)
                <li>Task: {{ $task->name }} | Project: {{ $task->project->name ?? 'No project' }} | Assigned to: {{ $task->admin->name ?? 'Sin asignar' }} | Status: {{ $task->status }}</li>
            @endforeach
        </ul>
    @else
        <p>No tasks found.</p>
    @endif
@endif



</div>

</body>
</html>
