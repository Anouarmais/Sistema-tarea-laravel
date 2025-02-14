<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tasks,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|in:pendiente,en proceso,completada',
        ]);
    
        $task = Task::findOrFail($request->id);
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    
        return redirect()->back()->with('success', 'Tarea actualizada correctamente!');
    }
    

}
