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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description');
            $table->text('content')->nullable();
//            $table->string('img_path')->nullable();
//            $table->string('preview_path')->nullable();
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->foreignId('profile_id')->index()->constrained('profiles');
            $table->unsignedBigInteger('views')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
