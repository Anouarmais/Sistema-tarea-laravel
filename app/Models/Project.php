<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Agrega esto
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'description', 'admin_id'];
    /**
     * Relación: Un proyecto tiene muchas tareas.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id');
    }

    /**
     * Relación: Un proyecto tiene un administrador (usuario).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}

