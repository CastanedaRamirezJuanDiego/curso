<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments("ide");
            $table->string("nombre",40);
            $table->string("apellido",40);
            $table->string("email",40);
            $table->string("celular",10);
            $table->string("sexo",1);
            $table->integer("idd")->unsigned();
            $table->foreign("idd")->references("idd")->on("departamentos");
            $table->string("descripcion",255);
            $table->string("edad",2);
            $table->string("salario");
            $table->rememberToken();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
