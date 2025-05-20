<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ticket', function (Blueprint $table) {
            if (!Schema::hasColumn('ticket', 'title')) {
                $table->string('title')->nullable();
            }
            if (!Schema::hasColumn('ticket', 'price')) {
                $table->decimal('price', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('ticket', 'quantity')) {
                $table->integer('quantity')->default(0);
            }
            if (!Schema::hasColumn('ticket', 'date')) {
                $table->date('date')->nullable();
            }
            if (!Schema::hasColumn('ticket', 'free')) {
                $table->boolean('free')->default(true);
            }
            if (!Schema::hasColumn('ticket', 'sales')) {
                $table->integer('sales')->default(0);
            }
            if (!Schema::hasColumn('ticket', 'seat')) {
                $table->string('seat')->nullable();
            }
            if (!Schema::hasColumn('ticket', 'status')) {
                $table->string('status')->default('active');
            }
        });
    }

    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropColumn(['title', 'price', 'quantity', 'date', 'free', 'sales', 'seat', 'status']);
        });
    }
};