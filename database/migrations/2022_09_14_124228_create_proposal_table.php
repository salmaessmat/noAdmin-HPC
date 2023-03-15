<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('project_id');
            $table->integer('project_edit');
            $table->integer('duration')->nullable();
            $table->boolean('submitted')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['project_id', 'project_edit'], 'FKproposal80654');
            $table->primary(['id', 'project_edit']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal');
    }
}
