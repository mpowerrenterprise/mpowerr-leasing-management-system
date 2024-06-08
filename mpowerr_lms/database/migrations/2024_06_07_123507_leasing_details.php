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
            $table->string('khjjh');
            $table->integer('kjkj'); // Age should be an integer
            $table->string('ioi'); // Email should be a string
            $table->string('hhsh'); // Mobile number should be a string
            $table->string('ssd'); // NIC number should be a string
            $table->string('sdws'); // Address should be a string
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
