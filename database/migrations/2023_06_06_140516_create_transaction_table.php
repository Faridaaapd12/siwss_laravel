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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('order_id')->primary();
            $table->string('pemesanan_id', 11);
            $table->string('status_code', 4);
            $table->string('status_message', 50);
            $table->string('transaction_id', 100);
            $table->double('gross_amount', 10, 0);
            $table->string('payment_type', 40);
            $table->dateTime('transaction_time');
            $table->string('transaction_status', 40);
            $table->string('bank', 40)->nullable();
            $table->string('va_number', 40)->nullable();
            $table->string('fraud_status', 40)->nullable();
            $table->string('bca_va_number', 40)->nullable();
            $table->string('permata_va_number', 40)->nullable();
            $table->string('pdf_url', 200)->nullable();
            $table->string('finish_redirect_url', 200)->nullable();
            $table->string('bill_key', 20)->nullable();
            $table->string('biller_code', 5)->nullable();
            // $table->timestamps();
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
};
