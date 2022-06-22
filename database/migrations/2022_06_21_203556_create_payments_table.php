<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('responsible_id');
            $table->float("total");
            $table->enum("status", ['Pending', 'Rejected', 'Completed']);
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('responsible_id')->references('id')->on('responsibles')->onDelete('RESTRICT')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
