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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'huesped_id' )->references( 'id' )->on( 'huespeds' );
            $table->foreignId( 'cuarto_id' )->references( 'id' )->on( 'cuartos' );
            $table->date( 'in' );
            $table->date( 'out' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
