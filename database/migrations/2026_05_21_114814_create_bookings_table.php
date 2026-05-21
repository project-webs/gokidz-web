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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('child_name');
            $table->integer('child_age');
            $table->string('school_name');
            $table->text('pickup_address');
            $table->string('shuttle_type'); // round_trip, morning_only, afternoon_only
            $table->string('status')->default('pending'); // pending, approved, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
