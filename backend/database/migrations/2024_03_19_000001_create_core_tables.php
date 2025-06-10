<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id('attendee_id');
            $table->integer('human_id');
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->time('time');
            $table->string('location');
            $table->integer('capacity');
            $table->string('category');
            $table->string('status')->default('upcoming');
            $table->foreignId('organizer_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('attendee_events_search', function (Blueprint $table) {
            $table->id();
            $table->integer('attendee_id');
            $table->integer('event_id');
            $table->timestamps();

            $table->foreign('attendee_id')
                  ->references('attendee_id')
                  ->on('attendees')
                  ->onDelete('cascade');
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->string('status')->default('available');
            $table->timestamps();
        });

        Schema::create('attendee_ticket_access', function (Blueprint $table) {
            $table->id();
            $table->integer('attendee_id');
            $table->integer('ticket_id');
            $table->timestamps();

            $table->foreign('attendee_id')
                  ->references('attendee_id')
                  ->on('attendees')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendee_ticket_access');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('attendee_events_search');
        Schema::dropIfExists('events');
        Schema::dropIfExists('attendees');
    }
}; 