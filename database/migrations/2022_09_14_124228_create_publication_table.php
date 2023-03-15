<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('project_id');
            $table->integer('project_edit');
            $table->integer('conference_id')->index('FKpublicatio842385');
            $table->string('title')->nullable();
            $table->string('url', 225);
            $table->integer('year')->nullable();
            $table->mediumText('image')->nullable();
            $table->mediumText('file')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['project_id', 'project_edit'], 'project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication');
    }
}
