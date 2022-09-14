<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',30);
            $table->string('type',20);
            $table->string('dr',20);
            $table->longText('des');
            $table->string('forr')->nullable();
            $table->string('notice')->nullable();
            $table->string('FrontEnd')->nullable();
            $table->string('BackEnd')->nullable();
            $table->string('Documentation')->nullable();
            $table->string('DataBase')->nullable();
            $table->string('user_fun')->nullable();
            $table->string('lang');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
