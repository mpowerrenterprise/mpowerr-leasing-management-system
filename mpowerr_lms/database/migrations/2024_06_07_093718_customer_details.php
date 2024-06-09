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
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age'); // Age should be an integer
            $table->string('email'); // Email should be a string
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('grade');
            $table->string('mobile_no'); // Mobile number should be a string
            $table->string('nic_no'); // NIC number should be a string
            $table->string('address'); // Address should be a string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
