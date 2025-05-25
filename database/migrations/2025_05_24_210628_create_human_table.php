<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (!Schema::hasTable('human')) {
            Schema::create('human', function (Blueprint $table) {
                $table->id('human_id');
                $table->string('name');
                $table->integer('age');
                $table->string('password');
                $table->string('location');
                $table->string('email')->unique();
                $table->string('creditcard');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('human');
    }
};
