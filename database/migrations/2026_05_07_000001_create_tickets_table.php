<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('category', ['hardware', 'software', 'red', 'mantenimiento', 'otro'])->default('otro');
            $table->enum('priority', ['alta', 'media', 'baja'])->default('media');
            $table->enum('status', ['pendiente', 'en_proceso', 'resuelto', 'cerrado'])->default('pendiente');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('tecnico_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
