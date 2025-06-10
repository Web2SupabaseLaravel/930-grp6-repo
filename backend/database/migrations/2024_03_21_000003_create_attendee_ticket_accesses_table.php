<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendee_ticket_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendee_id')->constrained('attendee')->onDelete('cascade');
            $table->string('ticket_id');
            $table->timestamp('access_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendee_ticket_access');
    }
}; 