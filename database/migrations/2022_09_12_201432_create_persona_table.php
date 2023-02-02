<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',10)->unique();
            $table->string('nombre',150);
            $table->string('apellido',150);
            $table->integer('edad');
            $table->string('sexo',10);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefono',10);
            $table->timestamps();
        });
        DB::table('personas')->insert(
            array(
                'cedula'=> '0000000000',
                'nombre'=> 'admin',
                'apellido'=> 'admin',
                'edad'=> '1',
                'sexo'=> 'M',
                'email'=> 'admin@elperno.com',
                'telefono'=> '0000000000',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }


}
