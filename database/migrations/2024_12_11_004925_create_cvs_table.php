<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_cvs_table.php
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con el usuario
            $table->string('full_name');
            $table->text('contact_info');
            $table->text('education');
            $table->text('work_experience');
            $table->text('skills');
            $table->text('languages');
            $table->timestamps();

            // Llave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Revertir las migraciones.
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
};
