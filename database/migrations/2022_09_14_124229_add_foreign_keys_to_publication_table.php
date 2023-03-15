<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publication', function (Blueprint $table) {
            $table->foreign(['project_id', 'project_edit'], 'publication_ibfk_1')->references(['id', 'edit'])->on('project');
            $table->foreign(['conference_id'], 'FKpublicatio842385')->references(['id'])->on('conference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publication', function (Blueprint $table) {
            $table->dropForeign('publication_ibfk_1');
            $table->dropForeign('FKpublicatio842385');
        });
    }
}
