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
            //$table->dropForeign('uploader_id');
            $table->id();
            $table->string('run_title');
            $table->time('time',$precision = 3)->format('H:i:s.u');
            $table->string('youtube_link');
            $table->string('comment_onrun')->nullable();
            $table->unsignedBigInteger('uploader');
            $table->unsignedBigInteger('run_category');
            $table->timestamp('uploaded_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('isAccepted');
            $table->foreign('uploader')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('run_category')->references('id')->on('categories')->onDelete('cascade');
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
