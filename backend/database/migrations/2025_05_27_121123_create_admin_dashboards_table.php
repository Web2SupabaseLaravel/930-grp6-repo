<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admin_dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('dashboard')->nullable();
            $table->string('event_registrations')->nullable();
            $table->string('revenue')->nullable();
            $table->string('attendee_demographics')->nullable();
            $table->unsignedBigInteger('admin_id'); // Foreign key reference
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_dashboards');
    }
};
