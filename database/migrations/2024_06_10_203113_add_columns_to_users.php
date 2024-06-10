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
        Schema::table('users', function (Blueprint $table) {
            $table->string( 'phone' )->unique();
            $table->string( 'last_name' )->afer( 'name' );
            $table->string( 'token' );
            $table->integer( 'rol' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn( 'phone' );
            $table->dropColumn( 'last_name' );
            $table->dropColumn( 'token' );
            $table->dropColumn( 'rol' );
        });
    }
};
