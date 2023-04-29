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
        Schema::create('runs', function (Blueprint $table) {
            $table->id();
            $table->integer('run_category');
            $table->string('run_title');
            $table->string('time');
            $table->string('youtube_link');
            $table->string('comment_onrun')->nullable();
            $table->unsignedBigInteger('uploader');
            $table->foreign('uploader')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('runs');
    }
};
