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
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();

            // Article_id
            $table->unsignedBigInteger('article_id')->nullable(); //colonna per l'article id
            $table->foreign('article_id')->references('id')->on('articles');

            // Tag_id

            $table->unsignedBigInteger('tag_id')->nullable(); //colonna per il tag_id
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->timestamps();
        });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::table('article_tag', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['tag_id']);
        });

        Schema::dropIfExists('article_tag');
    }
};
