<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_proposal', function (Blueprint $table) {
            $table->foreign(['proposal_id', 'project_edit'], 'FKevent_prop415416')->references(['id', 'project_edit'])->on('proposal');
            $table->foreign(['event_id'], 'FKevent_prop374491')->references(['id'])->on('event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_proposal', function (Blueprint $table) {
            $table->dropForeign('FKevent_prop415416');
            $table->dropForeign('FKevent_prop374491');
        });
    }
}
