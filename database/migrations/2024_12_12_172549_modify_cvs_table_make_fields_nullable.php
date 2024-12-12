<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCvsTableMakeFieldsNullable extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('linkedin')->nullable()->change();
            $table->string('portfolio')->nullable()->change();
            $table->text('objective')->nullable()->change();
            $table->text('profile')->nullable()->change();
            // Añade más campos según sea necesario
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->string('address')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('linkedin')->nullable(false)->change();
            $table->string('portfolio')->nullable(false)->change();
            $table->text('objective')->nullable(false)->change();
            $table->text('profile')->nullable(false)->change();
            // Añade más campos según sea necesario
        });
    }
}
