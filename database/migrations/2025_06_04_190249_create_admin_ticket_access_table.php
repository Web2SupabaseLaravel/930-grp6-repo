<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('admin_ticket_access', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('admin_id');
        $table->unsignedBigInteger('ticket_type_id');
        $table->timestamps();

        $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_ticket_access');
    }
};
