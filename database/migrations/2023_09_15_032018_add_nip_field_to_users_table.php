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
        Schema::table('users', function (Blueprint $table) {
            $table->char('nip',18)->nullable();
            $table->string('pangkat')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('phone_number')->nullable();
            $table->foreignId('unit_id')->nullable()->constrained();
            $table->foreignId('position_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
