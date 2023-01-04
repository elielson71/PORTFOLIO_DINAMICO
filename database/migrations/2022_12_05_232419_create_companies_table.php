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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->unique();
            $table->string('phone',20);
            $table->string('address',100);
            $table->string('instragem',200);
            $table->string('twitter',200);
            $table->string('facebook',200);
            $table->string('linkedin',200);
            $table->string('youtube',200);
            $table->string('color_site',10);
            $table->string('text_footer_site',255);
            $table->string('path_logo',200);
            $table->string('path_icon',200);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('companies');
    }
};
