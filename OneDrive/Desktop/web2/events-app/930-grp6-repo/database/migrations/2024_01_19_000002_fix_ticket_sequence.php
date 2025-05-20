<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // First get the max ID
        $maxId = DB::select("SELECT MAX(ticket_id) as max_id FROM ticket")[0]->max_id ?? 0;
        
        // Then alter the sequence
        DB::statement("ALTER SEQUENCE ticket_ticket_id_seq RESTART WITH " . ($maxId + 1));
    }

    public function down()
    {
        // No down migration needed
    }
};