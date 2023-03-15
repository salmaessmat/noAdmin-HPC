<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_proposal', function (Blueprint $table) {
            $table->integer('event_id');
            $table->integer('proposal_id');
            $table->integer('project_edit');

            $table->index(['proposal_id', 'project_edit'], 'FKevent_prop415416');
            $table->primary(['event_id', 'proposal_id', 'project_edit']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_proposal');
    }
}
