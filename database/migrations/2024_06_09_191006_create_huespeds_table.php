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
        Schema::create('huespeds', function (Blueprint $table) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'last_name' );
            $table->date( 'born_day' );
            $table->string( 'email' );
            $table->string( 'phone' );
            $table->string( 'sex' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huespeds');
    }
};
