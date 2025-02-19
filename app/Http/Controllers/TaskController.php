<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\DeletedTask;

class TaskController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required|max:255',
        'project_id' => 'required|exists:projects,id',
        'user_id' => 'required|exists:users,id', 
    ]);

    Task::create([
        'name' => $request->name,
        'description' => $request->description,
        'admin_id' => $request->user_id,
        'project_id' => $request->project_id,
    ]);

    return redirect()->back()->with('success', 'Task created successfully!');
}

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tasks,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|in:pendiente,en proceso,completada',
            'admin_id' => 'required|exists:users,id',
        ]);
    
        $task = Task::findOrFail($request->id);
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'admin_id' => $request->admin_id,
            'status' => $request->status,
        ]);
    
        return redirect()->back()->with('success', 'Tarea actualizada correctamente!');
    }




    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tasks,id',
            'status' => 'required|in:pendiente,en proceso,completada',
        ]);
    
        $task = Task::findOrFail($request->id);
        $task->update(['status' => $request->status]);
    
        return response()->json(['message' => 'Estado actualizado correctamente']);
    }
    

    public function deleteTask($id) {
        try {
            $task = Task::findOrFail($id);
            
            // Mover la tarea eliminada a la tabla 'deleted_tasks'
            DeletedTask::create([
                'name' => $task->name,
                'description' => $task->description,
                'admin_id' => $task->admin_id,
                'project_id' => $task->project_id,
            ]);
    
            // Eliminar la tarea original
            $task->delete();
    
            return response()->json(['message' => 'Tarea eliminada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la tarea: ' . $e->getMessage()], 500);
        }
    }
    
    
    

}
