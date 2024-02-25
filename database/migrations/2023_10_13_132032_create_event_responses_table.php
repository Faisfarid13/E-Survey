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
        Schema::create('event_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->nullable()->constrained()->onDelete('cascade');
            $table->uuid()->nullable();
            $table->text('name');
            $table->text('email');
            $table->string('nip',18)->nullable();
            $table->string('pangkat')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('pendidikan')->nullable();
            $table->text('university_of_origin')->nullable();
            $table->string('major')->nullable();
            $table->string('position')->nullable();
            $table->string('phone_number');
            $table->text('home_address');
            $table->text('office_address')->nullable();
            $table->text('org_experience')->nullable();
            $table->string('bank')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('rek_name')->nullable();
            $table->string('npwp')->nullable();
            $table->text('hobby')->nullable();
            $table->text('social_media')->nullable();
            $table->text('sign_path')->nullable();
            $table->text('photo')->nullable();
            $table->string('status_pegawai');
            $table->text('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_responses');
    }
};
