<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('cvs', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' auto-incremental
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->text('contact_info');
            $table->text('education');
            $table->text('work_experience');
            $table->text('skills');
            $table->text('languages');
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
};