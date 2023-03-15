<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHumanEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('human_email', function (Blueprint $table) {
            $table->foreign(['human_id', 'human_edit'], 'FKhuman_emai487330')->references(['id', 'edit'])->on('human');
            $table->foreign(['email_id'], 'FKhuman_emai562982')->references(['id'])->on('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('human_email', function (Blueprint $table) {
            $table->dropForeign('FKhuman_emai487330');
            $table->dropForeign('FKhuman_emai562982');
        });
    }
}
