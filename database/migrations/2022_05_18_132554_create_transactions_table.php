<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id');
            $table->integer('user_id');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_address');
            $table->string('transaction_date');
            $table->string('book_image');
            $table->string('book_name');
            $table->string('description');
            $table->string('book_code');
            $table->string('book_page');
            $table->string('book_language');
            $table->string('total_qty');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('total_price');

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
        Schema::dropIfExists('transactions');
    }
}
