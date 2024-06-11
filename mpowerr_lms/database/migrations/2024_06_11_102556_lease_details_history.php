<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lease_details_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_id');
            $table->integer('installments');
            $table->timestamps();
            // Add other columns as needed, e.g., 'lease_id', 'amount', etc.
        });
    }

    public function down()
    {
        Schema::dropIfExists('lease_details_history');
    }
};
