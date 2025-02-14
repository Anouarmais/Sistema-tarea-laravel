<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade'); 
            $table->string('name');
            $table->text('description');
            $table->enum('status', ['pendiente', 'en proceso', 'completada'])->default('pendiente');
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade'); 
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

  
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};                                                                                                                                                                                                                                                                                    