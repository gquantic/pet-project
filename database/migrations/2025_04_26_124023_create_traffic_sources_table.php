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
        Schema::create('traffic_sources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->boolean('moderated')->default(false);
            $table->longText('moderated_comment')->default('Дождитесь окончания проверки.');
            $table->string('template', 30);
            $table->string('url');
            $table->string('title', 50);
            $table->string('comment')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_sources');
    }
};
