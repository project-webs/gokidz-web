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
        Schema::table('bookings', function (Blueprint $table) {
            // Add new columns
            $table->string('child_class')->after('child_name');
            $table->string('child_gender')->after('child_class'); // Laki-laki / Perempuan
            $table->text('extracurricular')->nullable()->after('shuttle_type');

            // Modify existing columns to be nullable
            $table->integer('child_age')->nullable()->change();
            $table->string('school_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Revert changes
            $table->integer('child_age')->nullable(false)->change();
            $table->string('school_name')->nullable(false)->change();

            // Drop columns
            $table->dropColumn(['child_class', 'child_gender', 'extracurricular']);
        });
    }
};
