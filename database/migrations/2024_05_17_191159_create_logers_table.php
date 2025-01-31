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
        Schema::create('logers', function (Blueprint $table) {
            $table->id();

            $table->string('operation_type')->nullable();
            $table->morphs('logerable');
            $table->json('old_content')->nullable();
            $table->json('new_content')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logers');
    }
};
