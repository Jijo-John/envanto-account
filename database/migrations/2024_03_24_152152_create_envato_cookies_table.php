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
        Schema::create('envato_cookies', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->longText('cookie')->nullable();
            $table->longText('user_agent')->nullable();
            $table->longText('x-csrf-token')->nullable();
            $table->longText('x-csrf-token-2')->nullable();
            $table->longText('headers')->nullable();
            $table->boolean('active')->default(true);
            $table->string('total_downloads')->default(0);
            $table->string('limit_downloads')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envato_cookies');
    }
};
