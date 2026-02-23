<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // nombre del rol (admin, residente, etc.)
            $table->string('description')->nullable(); // opcional
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};