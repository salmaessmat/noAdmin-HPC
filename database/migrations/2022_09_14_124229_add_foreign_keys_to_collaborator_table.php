<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCollaboratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collaborator', function (Blueprint $table) {
            $table->foreign(['project_id', 'project_edit'], 'FKcollaborat976307')->references(['id', 'edit'])->on('project');
            $table->foreign(['email_id'], 'FKcollaborat177178')->references(['id'])->on('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collaborator', function (Blueprint $table) {
            $table->dropForeign('FKcollaborat976307');
            $table->dropForeign('FKcollaborat177178');
        });
    }
}
