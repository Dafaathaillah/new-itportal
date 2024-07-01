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
        Schema::create('inv_wirellesses', function (Blueprint $table) {
            $table->id();
            $table->string('device_name', 255);
            $table->string('inventory_number', 255);
            $table->string('serial_number', 255);
            $table->string('ip_address', 255);
            $table->longText('device_brand');
            $table->string('device_type', 255);
            $table->string('device_model', 255);
            $table->string('location', 255);
            $table->string('status', 255);
            $table->string('note', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_wirellesses');
    }
};
