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

    public function index()
    {
        $tasks = $this->getTasks();
        $users = User::all(); 
        $projects = Project::all(); 
    
        return view('dashboard', compact('tasks', 'users', 'projects'));
    }
    
    public function tasksView()
    {
        $tasks = $this->getTasks();
        $users = User::all();
        $projects = Project::all();
    
        return view('tasksvista', compact('tasks', 'users', 'projects'));
    }
    
}
