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
        Schema::create('users_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('full_name', 255);
            $table->integer('phone');
            $table->string('email', 255);
            $table->string('country', 255);
            $table->string('city', 255);
            $table->integer('postal_code');
            $table->date('date_visit');
            $table->time('time_visit');
            $table->string('contact_person_name', 255);
            $table->integer('contact_person_phone');
            $table->string('notes', 255);
            $table->string('documents_type', 255);
            $table->date('documents_expire_date');
            $table->string('documents_file', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_detail');
    }
};
