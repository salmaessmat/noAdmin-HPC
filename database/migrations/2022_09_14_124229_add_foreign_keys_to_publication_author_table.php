<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPublicationAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publication_author', function (Blueprint $table) {
            $table->foreign(['human_id', 'human_edit'], 'FKpublicatio11348')->references(['id', 'edit'])->on('human');
            $table->foreign(['publication_id'], 'FKpublicatio725691')->references(['id'])->on('publication');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publication_author', function (Blueprint $table) {
            $table->dropForeign('FKpublicatio11348');
            $table->dropForeign('FKpublicatio725691');
        });
    }
}
