<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_email', function (Blueprint $table) {
            $table->integer('human_id');
            $table->integer('human_edit');
            $table->integer('email_id')->index('FKhuman_emai562982');

            $table->primary(['human_id', 'human_edit', 'email_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('human_email');
    }
}
