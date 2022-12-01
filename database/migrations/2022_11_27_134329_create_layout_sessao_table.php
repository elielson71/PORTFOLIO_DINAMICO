<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_sessao', function (Blueprint $table) {
            $table->unsignedBigInteger('layout_id');
            $table->foreign('layout_id')->references('id')->on('layout');
            $table->unsignedBigInteger('sessao_id');
            $table->foreign('sessao_id')->references('id')->on('sessao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layout_sessao');
    }
};
