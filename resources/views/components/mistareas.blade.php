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
@foreach ($tasks as $task)
<div class="bg-white w-[1136px] mx-auto border border-gray-600 p-6 rounded-xl shadow-md m-9 flex flex-wrap gap-[10px]">

    <div class="flex gap-[285px] w-full">
        <div>
            <label class="text-3xl">Proyect:</label><br>
            <input class="mt-1" type="text" value="{{ $task->project->name ?? 'No Project' }}" disabled>
        </div>

        <div>
            <label class="text-3xl">Task:</label><br>
            <input class="mt-1" type="text" value="{{ $task->name }}" disabled>
        </div>

        <div>
            <label class="text-3xl">State:</label><br>
            <select class="mt-1 border w-[125px] p-2 status-select" data-id="{{ $task->id }}">
                <option value="pendiente" {{ $task->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="en proceso" {{ $task->status == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="completada" {{ $task->status == 'completada' ? 'selected' : '' }}>Completada</option>
            </select>
        </div>
    </div>

    <div class="w-full mt-4">
        <label class="text-3xl">Description:</label><br>
        <textarea  class="mt-1 w-full" style=" resize:none" disabled>{{ $task->description }}</textarea>
    </div>

    <div class="w-full flex justify-end ">
        <button class="bg-blue-500 text-white px-4 py-2  rounded text-md update-status" data-id="{{ $task->id }}">
           Actualizar
        </button>
    </div>

</div>
@endforeach




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.update-status').on('click', function() {
            let taskId = $(this).data('id');
            let newState = $(this).parents('.bg-white').find('.status-select').val();




            $.ajax({
                url: "{{ route('task.updateStatus') }}",
                type: "PUT",
                data: {
                    id: taskId,
                    status: newState,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert('Estado actualizado correctamente');
                },
                error: function(xhr) {
                    alert('Error al actualizar el estado: ' + xhr.responseText);
                }
            });
        });
    });
</script>

</body>
</html>
