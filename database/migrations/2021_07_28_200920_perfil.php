<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Perfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('perfil', function(Blueprint $table){
            $table->integer('id')->primary();
            $table->string('perfil');
            
        });
        DB::table('perfil')->insert([
            ['perfil' => 'usuario', 'id' => 1],
            ['perfil' => 'gestor', 'id' => 2],
            ['perfil' => 'admin', 'id' => 3],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil');
    }
}
