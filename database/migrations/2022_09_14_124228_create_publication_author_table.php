<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_author', function (Blueprint $table) {
            $table->integer('publication_id');
            $table->integer('human_id');
            $table->integer('human_edit');

            $table->index(['human_id', 'human_edit'], 'FKpublicatio11348');
            $table->primary(['publication_id', 'human_id', 'human_edit']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_author');
    }
}
