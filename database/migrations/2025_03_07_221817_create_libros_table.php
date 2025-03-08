<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('isbn');
            $table->boolean('disponible')->default(true);
            $table->date('fecha_publicacion');
            $table->unsignedBigInteger('autor_id'); // Cambiamos el nombre a "autor_id"
            $table->foreign('autor_id') // Referenciamos la columna "autor_id"
                  ->references('id')
                  ->on('autores')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('libros');
    }
}