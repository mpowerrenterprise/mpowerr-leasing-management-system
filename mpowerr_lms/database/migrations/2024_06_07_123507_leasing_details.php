<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leasing_details', function (Blueprint $table) {
            $table->id();
            $table->string('nic_no');
            $table->integer('p_id'); // Age should be an integer
            $table->string('price'); // Email should be a string
            $table->string('installment'); // Mobile number should be a string
            $table->string('m_due'); // NIC number should be a string
            $table->string('date'); // Address should be a string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
