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
        Schema::create('inv_cctvs', function (Blueprint $table) {
            $table->id();
            $table->string('cctv_code', 255);
            $table->string('location', 255);
            $table->string('location_detail', 255)->nullable();
            $table->string('cctv_name', 255);
            $table->string('cctv_brand')->nullable();
            $table->string('cctv_model', 255)->nullable();
            $table->string('type_cctv', 255)->nullable();
            $table->string('mac_address', 255)->nullable();
            $table->string('ip_address');
            $table->string('vlan', 255)->nullable();;
            // $table->foreignId('nvr_id');
            // $table->foreignId('switch_id');

            $table->unsignedBigInteger('nvr_id');
            $table->foreign('nvr_id')->references('id')->on('inv_nvrs')->cascadeOnDelete();
            
            $table->unsignedBigInteger('switch_id');
            $table->foreign('switch_id')->references('id')->on('inv_switches')->cascadeOnDelete();
            
            $table->string('uplink', 255)->nullable();
            $table->dateTime('date_of_inventory')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('note', 255)->nullable();
            $table->string('last_status_ping', 255);
            $table->dateTime('last_update_ping');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_cctvs');
    }
};
