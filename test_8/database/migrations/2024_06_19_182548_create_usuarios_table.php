<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->unsignedBigInteger('perfil_id'); // Ajusta el tipo según corresponda

            // Definición de la llave foránea
            $table->foreign('perfil_id')
                ->references('id')
                ->on('perfiles')
                ->onDelete('cascade');

            $table->string('password');
            $table->string('role')->default('vendedor'); // Agregar la columna 'role'
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}