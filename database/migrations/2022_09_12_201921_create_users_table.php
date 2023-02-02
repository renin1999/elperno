<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona')->references('id')->on('personas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('rols')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'username'=> 'admin',
                'password'=>'$2a$12$twYCEDsAugDC8dK/5MWGXuVXPgGUa16J8ISPSHTtQWr31fCNlFSWi',
                'id_persona' =>'1',
                'id_rol' => '1'
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
        Schema::dropIfExists('users');
    }
}
