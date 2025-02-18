<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;

class DataController extends Controller
{
    // Obtener las tareas del usuario autenticado
    private function getTasks()
    {
        return \App\Models\Task::all();
    }

    
    
    public function tasksView()
    {
        $tasks = \App\Models\Task::with('admin')->get();

        $users = User::all();
        $projects = Project::all();
    
        return view('tasksvista', compact('tasks', 'users', 'projects'));
    }

    public function mistareas()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus tareas.');
        }
    
        $tasks = \App\Models\Task::where('admin_id', Auth::id())->get();
    
        if ($tasks->isEmpty()) {
            return view('vistauser', [
                'tasks' => [],
                'users' => User::all(),
                'projects' => Project::all(),
            ])->with('message', 'No tienes tareas asignadas.');
        }
    
        return view('vistauser', [
            'tasks' => $tasks,
            'users' => User::all(),
            'projects' => Project::all(),
        ]);
    }
    
    
    
}
