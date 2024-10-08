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
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('body'); //unsignedBigInteger rappresenta un numero positivo di infinite dimensioni
            $table->foreign('user_id')->references('id')->on('users'); //? Vincolo referenziale
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['user_id']); //rompere vincolo referenziale
            $table->dropColumn('user_id'); //eliminazione colonna
        });
    }
};
