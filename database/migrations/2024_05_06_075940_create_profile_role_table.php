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
        Schema::create('profile_role', function (Blueprint $table) {
            $table->id();

            $table->foreignId('profile_id')->index()->constrained('profiles');
            $table->foreignId('role_id')->index()->constrained('roles');
            $table->unique(['profile_id', 'role_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_role');
    }
};
