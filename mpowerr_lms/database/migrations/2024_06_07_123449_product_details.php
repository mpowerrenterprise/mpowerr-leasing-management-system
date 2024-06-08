<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('p_name');
            $table->integer('s_rate'); // Age should be an integer
            $table->integer('b_rate'); // Email should be a string
            $table->integer('p_id');
            $table->integer('p_quantity'); // Mobile number should be a string
            $table->string('p_model'); // NIC number should be a string
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
