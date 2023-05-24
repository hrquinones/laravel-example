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
        Schema::create('mediador', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dt_birth');
            $table->char('document_type',4);
            $table->char('document_id',20);
            $table->enum('sex',['male','female','not specified']);
            $table->date('dt_death')->nullable();
            $table->char('distrito',20);
            $table->timestamps();
        });

    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediador');
    }
};
