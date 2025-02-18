<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

@props(['tasks' => collect()]) 

<div class="bg-white w-[900px] h-[70px] mx-auto border border-gray-600 p-6 shadow-md m-9 flex gap-[76px]">
@foreach ($tasks as $task)
    <p>Proyect  :  {{ $task->project->name ?? 'No Project' }}</p>
    <p>Task  : {{ $task->name }}</p>
    <p>Description :{{ $task->description }}</p>
    <p>State :{{ $task->state }}</p>
</div>
@endforeach

</body>
</html>
