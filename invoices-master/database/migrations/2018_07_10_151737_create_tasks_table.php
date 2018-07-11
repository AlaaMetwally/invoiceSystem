<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('po_number')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->integer('currency_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('amount')->nullable();
            $table->float('fixed_price')->nullable();
            $table->date('start_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('admin_show')->default(0);
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
        Schema::dropIfExists('tasks');
    }

}
