<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory ;

class DeletedTask extends Model
{
    use HasFactory;
    protected $table = 'deleted_tasks';
    protected $fillable = ['task_id', 'name', 'description','project_id', 'admin_id', 'deleted_at'];
}
