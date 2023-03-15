<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('edit');
            $table->string('title', 155)->nullable();
            $table->text('summary')->nullable();
            $table->text('scientific_case')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('domain_id')->index('domain_id');

            $table->primary(['id', 'edit']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
}
