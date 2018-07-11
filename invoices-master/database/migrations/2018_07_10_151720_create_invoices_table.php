<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('adjustment_id')->nullable();
            $table->enum('adjustment_type', ['Decrease', 'Increase'])->nullable();
            $table->float('adjustment_percent')->nullable();
            $table->float('vat_percent')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('invoices');
    }

}
