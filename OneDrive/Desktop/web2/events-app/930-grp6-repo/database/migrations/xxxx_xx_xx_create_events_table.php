$table->foreign('ticket_id')
      ->references('id')
      ->on('tickets')
      ->onDelete('cascade');