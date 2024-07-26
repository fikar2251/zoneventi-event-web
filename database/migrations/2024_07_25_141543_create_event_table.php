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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('club_id')->references('id')->on('clubs');
            $table->text('description');
            $table->time('event_time_start');
            $table->time('event_time_end');
            $table->date('event_date');
            $table->string('location', 255);
            $table->string('longitude', 255);
            $table->string('latitude', 255);
            $table->string('banner', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
