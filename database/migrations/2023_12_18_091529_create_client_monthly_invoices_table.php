<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_monthly_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('activity_key')->nullable();
            $table->string('activity');
            $table->string('description')->nullable();
            $table->integer('qty')->default(0)->comment('0 no value, 0 > consider for calculation');
            $table->string('rate')->default(0)->comment('no value then 0');
            $table->string('amount')->nullable();
            $table->string('month');
            $table->string('year');
            $table->integer('client_id');
            $table->integer('status')->default(0)->comment('0 -> pending,1->approve,2->reject');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_monthly_invoices');
    }
};
