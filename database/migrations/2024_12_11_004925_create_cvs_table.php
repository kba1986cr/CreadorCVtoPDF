<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
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
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('linkedin')->nullable();
            $table->string('portfolio')->nullable();
            $table->text('objective')->nullable();
            $table->text('profile')->nullable();
            $table->json('work_experience')->nullable();
            $table->json('education')->nullable();
            $table->json('skills')->nullable();
            $table->json('languages')->nullable();
            $table->json('certifications')->nullable();
            $table->json('projects')->nullable();
            $table->json('achievements')->nullable();
            $table->json('references')->nullable();
            $table->json('additional_info')->nullable();
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
