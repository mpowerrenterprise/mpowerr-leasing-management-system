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
            Schema::create('lease_details', function (Blueprint $table) {
                $table->id();
                $table->integer('nic_no');
                $table->integer('p_id');
                $table->integer('price');
                $table->integer('installment');
                $table->integer('m_due');
                $table->string('date');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leases');
    }
};
