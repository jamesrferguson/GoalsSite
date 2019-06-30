<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_entries', function (Blueprint $table) {
            $table->bigIncrements('entryid');
            $table->string('entryname');
            $table->date('entrydate');
            $table->string('entrytext', 2000);
            $table->timestamps();
            $table->unsignedBigInteger('goal_id');
            $table->foreign('goal_id')->references('goalid')->on('goals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal_entries');
    }
}
