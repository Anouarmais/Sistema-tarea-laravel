<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes; // <-- Aquí agregamos HasFactory

    protected $fillable = ['admin_id', 'name', 'description', 'status', 'project_id'];

    /**
     * Relación: Una tarea pertenece a un proyecto.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación: Una tarea pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
