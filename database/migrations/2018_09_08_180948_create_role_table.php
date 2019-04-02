<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
          //  $table->increments('id_roles');
            $table->integer('id_roles')->unsigned();
            $table->string('role');
            $table->timestamps();
            $table->primary('id_roles');
        });
        DB::table('role')->insert(
          array(
            'id_roles'=>'1',
            'role'=>'admin',
          )
        );
        DB::table('role')->insert(
          array(
            'id_roles'=>'2',
            'role'=>'moder',
          )
        );
        DB::table('role')->insert(
          array(
            'id_roles'=>'3',
            'role'=>'user',
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
        Schema::dropIfExists('role');
    }
}
