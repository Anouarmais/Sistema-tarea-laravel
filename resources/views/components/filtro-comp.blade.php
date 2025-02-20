<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="mt-10">
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

<div class="mt-[50px] flex flex-col justify-center items-center space-y-6 w-full">
    @if(request('query') !== null && request('query') !== '')
        @if($tasks->count() > 0)
            @foreach($tasks as $task)
                <div class="bg-white w-[900px] border border-gray-600 p-6 rounded-xl shadow-lg">
        
                        <div>
                            <label class="text-xl font-semibold">Project:</label><br>
                            <input class="mt-1 w-full text-lg p-2 border border-gray-300 rounded" type="text" value="{{ $task->project->name ?? 'No Project' }}" disabled>
                        </div>

                        <div class="mt-4">
                            <label class="text-xl font-semibold">Task:</label><br>
                            <input class="mt-1 w-full text-lg p-2 border border-gray-300 rounded" type="text" value="{{ $task->name }}" disabled>
                        </div>
                 
                        <div class="mt-4">
                            <label class="text-xl font-semibold">Estado:</label><br>
                            <input class="mt-1 w-full text-lg p-2 border border-gray-300 rounded" type="text" value="{{ $task->status }}" disabled>
                        </div>
                    <div class="mt-4">
                        <label class="text-xl font-semibold">Description:</label><br>
                        <textarea class="mt-1 w-full text-lg p-2 border border-gray-300 rounded" style=" resize:none" disabled>{{ $task->description }}</textarea>
                    </div>

             
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-700">No tasks found.</p>
        @endif
    @endif
</div>


</body>
</html>
