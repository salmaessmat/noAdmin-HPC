<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborator', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('project_id');
            $table->integer('project_edit');
            $table->integer('email_id')->index('FKcollaborat177178');
            $table->timestamp('created_at')->nullable();

            $table->index(['project_id', 'project_edit'], 'FKcollaborat976307');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborator');
    }
}
