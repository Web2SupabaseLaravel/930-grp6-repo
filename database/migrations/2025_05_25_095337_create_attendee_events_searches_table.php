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
        Schema::create("attendee_events_searches", function (Blueprint $table) {
            $table->id();
            $table->foreignId("attendee_id")->constrained("attendees")->onDelete("cascade"); // Foreign key to attendees table
            $table->string("search_query"); // The search term used by the attendee
            // Add other relevant fields if needed, e.g., search_timestamp
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("attendee_events_searches");
    }
};

